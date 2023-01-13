<?php

namespace App;

require_once 'controller/errors.php';

class App{
    
    function __construct(){

        $url = explode('/', preg_replace('#/$#', '', $_GET['url'] ?? null));

        if(empty($url[0])){
            require_once 'controller/main.php';
            (new \Controller\Main())->loadmodel('Main')->render();
            return false;
        } 

        $archivoController  = 'controller/'.$url[0]. '.php';

        if(file_exists($archivoController)){
            require_once strtolower($archivoController);

            $controllerName = '\\Controller\\'.$url[0]; 
            
            // inicaliza el controlador
            $controller = new $controllerName();
            $controller->loadmodel($url[0]);

            // numero de elmentos del arreglo
            $nparam = sizeof($url);

            if ($nparam > 1) {
                if ($nparam > 2) {
                    $param = [];
                    for($i = 2; $i<$nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    $this->validateExistsController($controller,$url[1],$param);
                }else{

                    $this->validateExistsController($controller,$url[1]);
                }
            }else{
                $controller->render();   
            }
        }else{
            $controller = new \Controller\Errors();
        }
    }

    private function validateExistsController(Object $controller,String $method,$param =[]){
        if(!\method_exists($controller,$method)){
            $controller = new \Controller\Errors();
            return false;
        }
        $controller->{$method}($param);
    }
}