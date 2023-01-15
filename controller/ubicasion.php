<?php

namespace Controller;

class Ubicasion extends \Libs\Controller{

    function __construct(){
        parent::__construct();
    }

    function render($message = ""){
        $Ubicasion = $this->model->getAll();
        $this->view->enlaces = $Ubicasion; 
        $this->view->mensaje = $message;
        $this->view->render('ubicasion/index');
    }

    function nueva(){
        $this->view->mensaje = "";
        $this->view->render('ubicasion/nuevo');
    }
    
    function modificar($param = null){
        $info = $this->model->getUbicasion($param[0]);
        session_start();
        $_SESSION['id_ubicasion'] = $info->id;
        $this->view->info = $info;
        $this->view->mensaje = "";
        $this->view->render('ubicasion/edit');
    }

    function nuevaUbicasion(){
        $nombre = $this->getPost('nombre'); 
        $mensaje = "";

        if($this->model->newLocation($nombre)){
            $this->redirect('http://localhost/MarcadorPages/Ubicasion');
        }else{
            $mensaje = "Esta ubicasion ya existe";
            $this->view->mensaje = $mensaje;
            $this->nueva();
        }
    }

    function updateUbicasion(){
        session_start();
        $id = $_SESSION['id_ubicasion'];
        $nombre = $this->getPost('nombre');

        unset( $_SESSION['id_ubicasion']);

        $mensaje = "";
        if($this->model->updateUbucasion([
            'id' =>$id,
            'nombre'=>$nombre,
        ])){
            $this->redirect('http://localhost/MarcadorPages/Ubicasion');
        }else{
            $mensaje = "Ocurrio un error no se puede modificar";
            $this->mensaje = $mensaje;
            $this->modificar([
                'id' => $id
            ]);
        }
    }

    function elimiarUbicasion($param = null){
        $estado = $this->model->deletedUbucasion($param[0]);

        if($estado){
            $this->redirect('http://localhost/MarcadorPages/Ubicasion');
        }else{
            $mensaje = "La ubicasión contiene enlaces";
            $this->render($mensaje);
        }
    }

    //API Rest

    // function Ubicasiones(){
    //     try{
    //         $Ubicasion = $this->model->getAll();
    //         http_response_code(200);
    //         $response = $this->GETAPIJSON($Ubicasion);
    //         echo $response;
    //     }catch(\PDOException $e){
    //         http_response_code(404);
    //         echo json_encode(array("message" => "Recurso no encontrado"));
    //     }
 
    // }
}