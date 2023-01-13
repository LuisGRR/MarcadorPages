<?php

namespace Libs;

class Controller{
    function __construct(){
        $this->view = new \View\View();
    }

    public function loadModel($model){
        $url = 'models/'. $model . 'model.php';
        if(file_exists($url)){
            require $url;
            $modelName = '\\Models\\'.$model.'Model';
            $this->model = new $modelName();
        }
        return $this;
    }

       
    function existPOST($params){
        foreach ($params as $param) {
            if(!isset($_POST[$param])){
                return false;
            }
        }
        return true;
    }

    function existGET($params){
        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                return false;
            }
        }
        return true;
    }

    function getGet($name){
        return $_GET[$name];
    }

    function getPost($name){
        return $_POST[$name];
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
    
    function GETAPIJSON($data){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        if(empty($data)){
            return json_encode(array("message" => "Datos no encontrados"));
        }
            return json_encode($data);
    }

    function redirect($url, $mensajes = []){
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
}