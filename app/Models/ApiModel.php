<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class ApiModel extends \Com\Daw2\Core\BaseModel {

    function getPlayerByName($name) {
        $url = "https://www.thesportsdb.com/api/v1/json/3/searchplayers.php?p={$name}"; //Llamamos a la api con nuestro valor de búsuqeda como parámetro
        $datos = file_get_contents($url);
        $datos = json_decode($datos, true);
        
        $jugadores = [];
        $counter = 0; //contador de soporte
        
        if(is_countable($datos['player'])){ // verficamos que la búsqueda contenga datos, en caso negativo devolvemos el array vacío
            do {
                $dato = $datos['player'][$counter]; //Recorremos $datos gracias al counter

                if ($dato['strSport'] == 'Soccer') { //Verificamos que el deportista pertenezca al fútbol

                    $jugador = array(
                        'id' => $dato['idPlayer'],
                        'nombre' => $dato['strPlayer'],
                        'imagen' => $dato['strThumb'],
                        'nacionalidad' => $dato['strNationality'],
                        'nacimiento' => $dato['dateBorn'],
                        'equipo' => $dato['strTeam'],
                        'equipacion' => $this->getEquipacionByIdTeam($dato['idTeam'])
                    );
                    array_push($jugadores, $jugador); //Guardamos los datos en un array asociativo y lo pusheamos en el array de datos que enviaremos a la vista
                }

                $counter++;
            } while (count($jugadores) < 5 && $counter < count($datos['player'])); //El bucle se repite hasta un máximo de 5 resultados

        return $jugadores;
        }else{
            return $jugadores;
        }
    }

    function getEquipacionByIdTeam($idEquipo) {
        
        
        $urlEquipacion = "https://www.thesportsdb.com/api/v1/json/3/lookupequipment.php?id={$idEquipo}"; //llamamos a la api buscando las equipaciones del equipo perteneciente al jugador recorrido
        $datosEquipacion = file_get_contents($urlEquipacion);
        $datosEquipacion = json_decode($datosEquipacion, true);
        
        $mensaje = '';

        if (!is_null($datosEquipacion['equipment'])) { //Si es nulo no hay equipaciones
            foreach ($datosEquipacion['equipment'] as $equipacion) {

                if ($equipacion['strSeason'] == '2023-2024' && $equipacion['strType'] == '1st') { // Ahora comprobamos que exista una de la temporada actual
                    return $equipacion['strEquipment'];
                }else{
                    $mensaje = 'No hay equipación actual';
                }
            }
        } else {
            $mensaje = 'No hay datos de equipaciones';
        }
        return $mensaje;
    }
    
    
    function insertBusqueda(string $name){
        $stmt = $this->pdo->prepare("INSERT INTO `Jugadores`(`id`,`nombre`, `imagen`, `nacionalidad`, `fecha_nacimiento`, `equipo`, `equipación`) VALUES (:id, :nombre, :imagen, :nacionalidad, :fecha_nacimiento, :equipo, :equipacion)");
        
        $counter = 0;
        
        $datos = $this->getPlayerByName($name); //Lanzamos la búsqueda en la api para guardar los mismos jugadores que vemos en la vista
        
        foreach ($datos as $dato) {
 
            if($this->verificar(intval($dato['id'])) == 0) { //Comprobamos mediante el id del jugador si ya existe en la BBDD
                $vars =[ 
                    'id' => intval($dato['id']),
                    'nombre' => $dato['nombre'],
                    'imagen' => $dato['imagen'],
                    'nacionalidad' => $dato['nacionalidad'],
                    'fecha_nacimiento' => $dato['nacimiento'],
                    'equipo' => $dato['equipo'],
                    'equipacion' => $dato['equipacion']
                ];

                if($stmt->execute($vars)){ 
                    $counter++; //SI se realiza la inserción aumentamos el counter que es con lo que indicamos en vista cuántos se han insertado.
                }
            }
        }
        
        return $counter;
    }
    
    //esta función busca en la bbdd un jugador por id y devuevle si ya existe o no 
    function verificar(int $id){
        $stmt = $this->pdo->prepare("SELECT * FROM `Jugadores` WHERE id = ?");
        
        $stmt->execute([$id]);
        
        if ($stmt->fetch()){
            return 1;
        }else{
            return 0;
        }
    }
    
    function  getAllBBDD(){
        return $this->pdo->query("SELECT * FROM `Jugadores` ORDER BY `Jugadores`.`nombre` ASC")->fetchAll();
    }
}
