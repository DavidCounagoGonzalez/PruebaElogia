<?php
declare(strict_types = 1);
namespace Com\Daw2\Controllers;

class GuardadosController extends \Com\Daw2\Core\BaseController {
    
    public function index() {
        $data = array(
            'titulo' => 'Guardados',
            'seccion' => '/guardados'
        );        
        $this->view->showViews(array('templates/header.view.php', 'guardados.view.php', 'templates/footer.view.php'), $data);
    }
    
}
