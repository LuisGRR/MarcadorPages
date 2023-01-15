<?php

namespace View;

/**
* Clase para Renderizar la vista
*
* Esta clase proporciona funcion para mostrar la vista y mensajes
*
* @author Luis Gerardo Rivera Rivera
* @version 1.0
*/
class View {

    function __construct(){
    }


    /**
    * Muestar el archivo con la vista
    *
    * @param string $nombre El nombre del archivo
    * @param string $data Informacion que se muestra en la vista
    */
    public function render($nombre,$data = []){
        $this->d = $data; 
        require 'view/'. $nombre . '.php';
    }
} 