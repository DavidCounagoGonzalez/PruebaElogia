<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class InicioController extends \Com\Daw2\Core\BaseController {

    public function buscarJugadores() {

        $data = array(
            'titulo' => 'FreePlayerSearch',
            'seccion' => '/inicio'
        );
        
        if (!empty($_GET['jugador'])) {
            $_SESSION['jugador'] = $_GET['jugador'];
            $model = new \Com\Daw2\Models\ApiModel();
            $data['jugadores'] = $model->getPlayerByName($_SESSION['jugador']);
        }
        
        if(isset($_SESSION['mensajeMod'])){
            $data['mensajeMod'] = $_SESSION['mensajeMod'];
            unset($_SESSION['mensajeMod']);
        }
 
        $this->view->showViews(array('templates/header.view.php', 'inicio.view.php', 'templates/footer.view.php'), $data);
    }
    
    
    public function addJugadores(){ 
        
        if (isset($_SESSION['jugador'])) {
            $model = new \Com\Daw2\Models\ApiModel();
            $_SESSION['mensajeMod'] = $model->insertBusqueda($_SESSION['jugador']);
            
        }

        header("location: /?jugador={$_SESSION['jugador']}");
    }
}
