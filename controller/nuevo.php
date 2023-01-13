<?php

namespace Controller;

 class Nuevo extends \Libs\Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    // function render(){
    //     $this->view->render('nuevo/index');
    // }

    // function nuevoLink(){       
    //     $nombre = $this->getGet('nombre');
    //     $link = $this->getGet('link');
    //     $etiqueta = $this->getGet('etiqueta');
    //     $ubicasion = $this->getGet('ubicasion');

    //     $mensaje = "";

    //     if($this->model->nuevoEnlace([
    //         'nombre'=>$nombre,
    //         'link'=>$link,
    //         'etiquetas'=>$etiquetas,
    //         'ubicasion'=>$ubicasion
    //     ])){
    //         $this->redirect('http://localhost/MarcadorPages/nuevo');
    //     }else{
    //         $mensaje = "Este enlace ya esta guardado";
    //         $this->view->mensaje = $mensaje;
    //         $this->render();
    //     }
    // }

    
 }