<?php

declare (strict_types=1);

namespace Com\Daw2\Models;

class ApiModel extends \Com\Daw2\Core\BaseModel {

    function getPlayerByName($name) {
        $url = "https://www.thesportsdb.com/api/v1/json/3/searchplayers.php?p={$name}";
        $datos = file_get_contents($url);
        $datos = json_decode($datos, true);
        
        $jugadores = [];
        $counter = 0;
        
        if(is_countable($datos['player'])){
            do {
                $dato = $datos['player'][$counter];

                if ($dato['strSport'] == 'Soccer') {

                    $jugador = array(
                        'id' => $dato['idPlayer'],
                        'nombre' => $dato['strPlayer'],
                        'imagen' => $dato['strThumb'],
                        'nacionalidad' => $dato['strNationality'],
                        'nacimiento' => $dato['dateBorn'],
                        'equipo' => $dato['strTeam'],
                        'equipacion' => $this->getEquipacionByIdTeam($dato['idTeam'])
                    );
                    array_push($jugadores, $jugador);
                }

                $counter++;
            } while (count($jugadores) < 5 && $counter < count($datos['player']));

        return $jugadores;
        }else{
            return $jugadores;
        }
    }

    function getEquipacionByIdTeam($idEquipo) {
        
        
        $urlEquipacion = "https://www.thesportsdb.com/api/v1/json/3/lookupequipment.php?id={$idEquipo}";
        $datosEquipacion = file_get_contents($urlEquipacion);
        $datosEquipacion = json_decode($datosEquipacion, true);
        
        $mensaje = '';

        if (!is_null($datosEquipacion['equipment'])) {
            foreach ($datosEquipacion['equipment'] as $equipacion) {

                if ($equipacion['strSeason'] == '2023-2024' && $equipacion['strType'] == '1st') {
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
        
        $datos = $this->getPlayerByName($name);
        
        foreach ($datos as $dato) {
 
            if($this->verificar(intval($dato['id'])) == 0) {
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
                    $counter++;
                }
            }
        }
        
        return $counter;
    }
    
    
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
