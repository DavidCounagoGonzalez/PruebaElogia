<?php
declare(strict_types = 1);
namespace Com\Daw2\Controllers;

class GuardadosController extends \Com\Daw2\Core\BaseController {
    
    public function index() {
        
        $modelo = new \Com\Daw2\Models\ApiModel();
        
        $data = array(
            'titulo' => 'Guardados',
            'seccion' => '/guardados',
            'jugadores' => $modelo->getAllBBDD()
        );        
        $this->view->showViews(array('templates/header.view.php', 'guardados.view.php', 'templates/footer.view.php'), $data);
    }
    
}
