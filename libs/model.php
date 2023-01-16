<?php
namespace Libs;

/**
* Clase para Renderizar la vista
*
* Esta clase contiene funciones para realizar consultas a la BD
*
* @author Luis Gerardo Rivera Rivera
* @version 0.1
*/
class Model {

    private $conection;

    /**
    * Crea el objeto de la conexion a la BD
    *
    */
    function __construct() {
        // $this->db = new \Database\Database();
        $this->conection = \Database\Database::getInstance();
    }

    /**
    * Realiza la cosulta por medio de Query a la BD
    *
    * @param string $query parametro para pasar la cosulta que realizara
    * @return object de los datos cosultados
    */
    function query($query){
         return $this->conection->getConexion()->query($query);
    }

    /**
    * Realiza la cosulta por medio de Prepare a la BD
    *
    * @param string $query parametro para pasar la cosulta con criterios que realizaran la cosulta
    * @return object de los datos cosultados
    */
    function prepare($query){
        return $this->conection->getConexion()->prepare($query);
    }

}