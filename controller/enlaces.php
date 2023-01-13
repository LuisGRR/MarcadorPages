<?php

namespace Controller;

include 'models/ubicasionmodel.php';

class Enlaces extends \Libs\Controller{

    function __construct() {
        parent::__construct();
    } 

    function render(){
        $enlaces = $this->model->getAll();
        $this->view->enlaces = $enlaces; 
        $this->view->render('enlaces/index');
    }

    function nuevo() {
        $this->view->ubicasion = $this->getUbicasiones();
        $this->view->mensaje = "";
        $this->view->render('enlaces/nuevo');
    }

    function modificar($param = null){
        $info = $this->model->getLink($param[0]);
        session_start();
        $_SESSION['id_alumno'] = $info->uuid;
        $this->view->info = $info;
        $this->view->ubicasion = $this->getUbicasiones();
        $this->view->mensaje = "";
        $this->view->render('enlaces/edit');
    }

    function elimiar($param = null){
        $estado = $this->model->deleteLink($param[0]);

        if($estado){
            $mensaje = "Enlace elimnado exitosamente";
            $this->view->mensaje = $mensaje;
            $this->render();
        }else{
            $mensaje = "no se a eliminado el enlace";
            $this->view->mensaje = $mensaje;
            $this->render();
        }
    }

    function nuevoLink(){       
        $nombre = $this->getPost('name');
        $link = $this->getPost('link');
        $ubicasion = $this->getPost('ubicasion');
        $tag = $this->getPost('basic');
        $etiquetas = " ";

        $mensaje = "";

        if($this->model->nuevoEnlace([
            'nombre'=>$nombre,
            'link'=>$link,
            'etiquetas'=>$etiquetas,
            'ubicasion'=>$ubicasion
        ])){
            $this->redirect('http://localhost/MarcadorPages/Enlaces');
        }else{
            $mensaje = "Este enlace ya esta guardado";
            $this->view->mensaje = $mensaje;
            $this->nuevo();
        }
    }

    function updateLink(){
        session_start();
        $uuid =  $_SESSION['id_alumno'];
        $nombre = $this->getPost('nombre');
        $link = $this->getPost('link');
        $etiqueta = $this->getPost('basic');
        $ubicasion = $this->getPost('ubicasion');
        $etiquetas = " ";
        
        unset( $_SESSION['id_alumno']);

        $mensaje = "";
        if($this->model->updateLink([
            'uuid' =>$uuid,
            'nombre'=>$nombre,
            'link'=>$link,
            'etiquetas'=>$etiquetas,
            'ubicasion'=>$ubicasion
        ])){
            $this->redirect('http://localhost/MarcadorPages/Enlaces');
        }else{
            $mensaje = "Ocurrio un error no se puede modificar la informacion";
            $this->mensaje = $mensaje;
            $this->modificar([
               'uuid' => $uuid
            ]);
        }

    }

    function getUbicasiones(){
        $ubicasion = new \Models\UbicasionModel();
        return $ubicasion->getAll();
    }

}