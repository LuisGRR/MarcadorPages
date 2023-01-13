<?php

namespace View;

class View {
    function __construct(){

    }

    function render($nombre,$data = []){
        $this->d = $data; 
        require 'view/'. $nombre . '.php';
    }
} 