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
        do {
            $dato = $datos['player'][$counter];

            if ($dato['strSport'] == 'Soccer') {

                $jugador = array(
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
        } while (count($jugadores) < 5);

        return $jugadores;
    }

    function getEquipacionByIdTeam($idEquipo) {

        $urlEquipacion = "https://www.thesportsdb.com/api/v1/json/3/lookupequipment.php?id={$idEquipo}";
        $datosEquipacion = file_get_contents($urlEquipacion);
        $datosEquipacion = json_decode($datosEquipacion, true);

        if (!is_null($datosEquipacion['equipment'])) {
            foreach ($datosEquipacion['equipment'] as $equipacion) {
                if ($equipacion['strSeason'] == '2023-2024' && $equipacion['strType'] == '1st') {
                    return $equipacion['strEquipment'];
                }else{
                    return 'No existe equipación actual';
                }
            }
        } else {
            return 'No hay datos de equipaciones';
        }
    }
}
