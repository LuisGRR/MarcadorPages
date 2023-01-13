<?php

namespace Models;

 include 'class/enlaces.php';
 use Errors\Logger;


class MainModel extends \Libs\Model{

    public function __construct(){
        parent::__construct(); 
    }

    public function getLinks(){
        $items = [];

        try{
            $query = $this->query('SELECT "Enlaces"."UUID","Enlaces"."Orden","Enlaces"."Nombre" AS "NombreEnlace","Enlaces"."Etiqueta","Enlaces"."Link","Ubicasion"."Nombre" AS "NombreUbicasion" FROM "Enlaces" INNER JOIN "Ubicasion" ON "Enlaces"."Ubicasion" = "Ubicasion"."ID"');
             while($row = $query->fetch()){
                $enlaces = new \Models\Class\Enlaces();
                $enlaces->uuid = $row['UUID'];
                $enlaces->orden =  $row['Orden'];
                $enlaces->nombre = $row['NombreEnlace'];
                $enlaces->link = $row['Link'];
                $enlaces->etiquetas = $row['Etiqueta'] ;
                $enlaces->ubicasion = $row['NombreUbicasion'];
                array_push($items, $enlaces);
            }    
            return $items;      
        }catch(\PDOException $e){
            $this->errorsLogs($e,'mainModel_getLinks');
        }
    }
}