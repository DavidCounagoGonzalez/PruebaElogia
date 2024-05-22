<?php

namespace Com\Daw2\Core;

use Steampixel\Route;

class FrontController{
    
    static function main(){
        Route::add('/', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\InicioController();
                    $controlador->buscarJugadores();
                }
                , 'get');  
                
        Route::add('/guardados', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\GuardadosController();
                    $controlador->index();
                }
                , 'get');
                
        Route::add('/guardar', 
                function(){
                    $controlador = new \Com\Daw2\Controllers\InicioController();
                    $controlador->addJugadores();
                }
                , 'get');
                
        Route::pathNotFound(
            function(){
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error404();
            }
        );
        
        Route::methodNotAllowed(
            function(){
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error405();
            }
        );
        Route::run();
    }
}

