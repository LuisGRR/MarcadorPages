<?php

namespace Libs;

/**
* Clase para Renderizar la vista
*
* Esta clase proporciona funciones para el manejo de la vista, el modelo y las peticines
*
* @author Luis Gerardo Rivera Rivera
* @version 0.1
*/
class Controller{

    /**
    * Se crea el objeto de la clase vista 
    *
    */
    function __construct(){
        $this->view = new \View\View();
    }

    /**
    * busca el archivo del modelo del controlador
    *
    * @param string $model El nombre del archivo
    */
    public function loadModel($model){
        $url = 'models/'. $model . 'model.php';
        if(file_exists($url)){
            require $url;
            $modelName = '\\Models\\'.$model.'Model';
            $this->model = new $modelName();
        }
        return $this;
    }

    /**
    * Verifica si ya exsite la variable por POST
    *
    * @param array $params Array con los nombres de las variables
    * @return bool
    */
    public function existPOST($params){
        foreach ($params as $param) {
            if(!isset($_POST[$param])){
                return false;
            }
        }
        return true;
    }

    /**
    * Verifica si ya exsite la variable por GET
    *
    * @param array $params Array con los nombres de las variables
    * @return bool
    */
    public function existGET($params){
        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                return false;
            }
        }
        return true;
    }

    /**
     * Funcion para obtener el valor de la variable por GET 
     * 
     * @param string $name Nombre de la variable
     * @return string $_GET
     */
    public function getGet($name){
        return $_GET[$name];
    }

    /**
     * Funcion para obtener el valor de la variable por POST 
     * 
     * @access public
     * @param string $name Nombre de la variable
     * @return string $_POST
     */
    public function getPost($name){
        return $_POST[$name];
    }

    /**
     * Funcion para redireccionar la aplicasión especificando la ruta
     * 
     * @access public
     * @param string $url Nombre de la ruta
     * @param string $mensajes Mensajes que se pasaran como parametros
     */
    public function redirect($url, $mensajes = []){
        $data = [];
        $params = '';
        
        foreach ($mensajes as $key => $value) {
            array_push($data, $key . '=' . $value);
        }
        $params = join('&', $data);
        
        if($params != ''){
            $params = '?' . $params;
        }
        header('location: ' .$url . $params);
    }

    
    /**
     * Funcion para devolver la informacion en tipo JSON para una API Rest GET
     * 
     * @access public
     * @param string $data Informacion que se mandara en formato JSON
     * @return JSON $_POST
     */
    public function GETAPIJSON($data){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        if(empty($data)){
            return json_encode(array("message" => "Datos no encontrados"));
        }
            return json_encode($data);
    }

    // function getPut($name){
    //     header("Access-Control-Allow-Origin: *");
    //     header("Content-Type: application/json; charset=UTF-8");
    //     header("Access-Control-Allow-Methods: PUT");
    //     header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    //     $method = $_SERVER['REQUEST_METHOD'];
    //     if ('PUT' === $method) {
    //         parse_str(file_get_contents('php://input'), $_PUT);
    //     }// Function Edit Data
    //     if(!empty($_PUT[$name])) {
    //         return $_PUT[$name];
    //         // foreach($data as & $value){
    //         //     if($value[$name] === $_PUT[$name]){
    //         //         $value['name'] = $_PUT['name'];
    //         //         break; // Stop the loop after we've found the item
    //         //     }
    //         // }
    //     }
    // }
}