<?php

namespace Errors;

/**
* trait para el manjeo de log al momnento de que surja un error
*
* Esta clase proporciona funciones para el manejo de la vista, el modelo y las peticines
*
* @author Luis Gerardo Rivera Rivera
* @version 0.1
*/
trait Logger{

    /**
    * Guarda en un archivo la excepcion que se produjo en la aplicasión
    *
    * @param string $message Mensaje de la aplicasion con la informacion del error
    * @param string $nameFile Nombre del archivo donde se guardara la información
    */
    public function errorsLogs($message,$nameFile){
        error_log($message,3,'logs/'.$nameFile.'.log');
    }

}