<?php
namespace Libs;

class Model {

    function __construct() {
        $this->db = new \Database\Database();
    }

    function query($query){
         return $this->db->getConexion()->query($query);
    }

    function prepare($query){
        return $this->db->getConexion()->prepare($query);
    }

}