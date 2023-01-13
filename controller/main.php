<?php

namespace Controller;
 
class Main extends \Libs\Controller{
    function __construct(){
        parent::__construct();
    }

    public function render(){
        $enlaces = $this->model->getLinks();
        $this->view->enlaces = $enlaces; 
        $this->view->render('main/index');
    }
}