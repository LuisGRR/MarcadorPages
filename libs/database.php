<?php

namespace Database;

use Errors\Logger;

class Database{

    use Logger;

    private $host;
    private $user;
    private $password;
    private $database;
    private $conection;
    private $port;
    private $charset;

    public function __construct(){
        $this->host = DB_HOST;
        $this->user = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->database = DB_DATABASE;
        $this->connection = DB_CONECTION;
        $this->port = DB_PORT;
    }

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
