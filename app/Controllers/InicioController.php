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
            $jugador = $_GET['jugador'];
            $model = new \Com\Daw2\Models\ApiModel();
            $data['jugadores'] = $model->getPlayerByName($jugador);
        }
 
        $this->view->showViews(array('templates/header.view.php', 'inicio.view.php', 'templates/footer.view.php'), $data);
    }
}
