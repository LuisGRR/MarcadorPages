<?php

namespace App;

require_once 'controller/errors.php';

/**
* Clase para manejar las peticiones y controlar la aplicasión
*
* Esta clase se encarga de cargar el controlar de la vista que el usurio quiera acceder
*
* @author Luis Gerardo Rivera Rivera
* @version 0.1
*/
class App{

    function __construct(){

        //se obtiene la url
        $url = explode('/', preg_replace('#/$#', '', $_GET['url'] ?? null));

        //valida si se especifico otra ruta que no sea la raíz
        if(empty($url[0])){
            require_once 'controller/main.php';
            (new \Controller\Main())->loadmodel('Main')->render();
            return false;
        } 

        //Se asigna a una variable el nombre del controlador, de la ruta que se espefico
        $archivoController  = 'controller/'.$url[0]. '.php';

        //Se verifica si exsiste la ruta que el usuario desea acceder
        if(file_exists($archivoController)){
            require_once strtolower($archivoController);
            $controllerName = '\\Controller\\'.$url[0]; 
            
            // inicaliza el controlador
            $controller = new $controllerName();
            $controller->loadmodel($url[0]);

            // numero de elmentos del arreglo
            $nparam = sizeof($url);

            //se valida la contidad de parametros que contiene la url
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
            //encaso de que no encuantre el archivo del controlador, mostrara un apagina de error 
            $controller = new \Controller\Errors();
        }
    }

    /**
    * función para validar si exciste el methodo del controlador y ejecutar si exsiste
    *
    * @param object $controller controlador donde buscara el mothodo
    * @param string $method nombre del metodo el cual se desea ejecutar
    * @param array $parametros parametros que se utilizan en caso de que el metodo reciba
    */
    private function validateExistsController(Object $controller,String $method,$param =[]){
        if(!\method_exists($controller,$method)){
            $controller = new \Controller\Errors();
            return false;
        }
        $controller->{$method}($param);
    }
}