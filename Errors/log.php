<?php

namespace Errors;

trait Logger{

    public function errorsLogs($message,$nameFile){
        error_log($message,3,'logs/'.$nameFile.'.log');
    }

}