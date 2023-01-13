<?php

namespace Controller;

class Errors extends \Libs\Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "Error al cargar el recurso";

        $this->view->render('error/error');
    }
}