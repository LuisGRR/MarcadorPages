<?php

namespace Database;

use Errors\Logger;

/**
* Clase para crear la conexion a la BD
*
* Esta clase se encarga de cargar el controlar de la vista que el usurio quiera acceder
*
* @author Luis Gerardo Rivera Rivera
* @version 0.1
*/
class Database{

    use Logger;

    /**
    * @var string El host de la BD
    */
    private $host;
    
    /**
    * @var string User de la BD
    */
    private $user;

    /**
    * @var string Pasword de la BD
    */
    private $password;

     /**
    * @var string Nombre de la BD
    */
    private $database;

     /**
    * @var string Tipo de conexión
    */
    private $conection;

    /**
    * @var string Puerto de la conexión
    */
    private $port;


    /**
    * Asigna los valores de las variables de entorno
    */
    public function __construct(){
        $this->host = DB_HOST;
        $this->user = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->database = DB_DATABASE;
        $this->connection = DB_CONECTION;
        $this->port = DB_PORT;
    }

    /**
    * Realiza la conexion a la BD
    * @return conexion
    */
    public function getConexion(){
        
        $conetion =trim($this->connection).":host=" . $this->host .";port=". $this->port . "; dbname=" . $this->database;
        
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES=> false,
        ];

        try {
            $conexion = new \PDO($conetion,trim($this->user),trim($this->password));
            return $conexion;
        } catch (\PDOException $e) {
            http_response_code(404);
            $this->errorsLogs($e,'ConectD');
            die("Error en el servidor");
        }
    }

}
