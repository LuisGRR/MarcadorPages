<?php

namespace Models;
use  Ramsey\Uuid\Uuid;
use Errors\Logger;

include 'class/enlaces.php';

class EnlacesModel extends \Libs\Model{

    use Logger;

    public function __construct(){
        parent::__construct();
    }

    public function getAll(){
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
            $this->errorsLogs($e,'enlacesModel_getAll');
            return $items;
        }
    }
    public function nuevoEnlace($datos){
        try{
            $query = $this->prepare('INSERT INTO public."Enlaces"("UUID","Nombre","Link","Etiqueta","Ubicasion") VALUES (:UUID,:nombre,:link,:etiquetas,:ubicasion)');
        
            $query->execute([
                'UUID'=>Uuid::uuid4(),
                'nombre'=>$datos['nombre'],
                'link'=>$datos['link'],
                'etiquetas'=>$datos['etiquetas'],
                'ubicasion'=>$datos['ubicasion']
            ]);
            return true;
        }catch(\PDOException $e){
            $this->errorsLogs($e,'enlacesModel_nuevoEnlace');
            return false;
        }
    }

    public function deleteLink($uuid){
        try{
            $query = $this->prepare('DELETE FROM public."Enlaces" WHERE "UUID" = :UUID');
            $query->execute([
                'UUID'=>$uuid
            ]);
            return true;
        }catch(\PDOException $e){
            $this->errorsLogs($e,'enlacesModel_deleteLink');
            return false;
        }
    }

    public function updateLink($datos){
        try{
            $query = $this->prepare('UPDATE "Enlaces" SET "Nombre" = :nombre, "Link" = :link , "Etiqueta" = :etiquetas , "Ubicasion"=:ubicasion WHERE "UUID" = :UUID');
            $query->execute([
                'UUID'=>$datos['uuid'],
                'nombre'=>$datos['nombre'],
                'link'=>$datos['link'],
                'etiquetas'=>$datos['etiquetas'],
                'ubicasion'=>$datos['ubicasion']
            ]);
            return true;
        }catch(\PDOException $e){
            $this->errorsLogs($e,'enlacesModel_updateLink');
            return false;
        }
    }
    
    public function getLink($uuid){
        $enlaces = new \Models\Class\Enlaces();
        try{
            $query = $this->prepare('SELECT * FROM public."Enlaces" WHERE "UUID" = :uuid');
            $query->execute([
                'uuid' => $uuid,
            ]);
            while ($row = $query->fetch()){
                $enlaces->uuid = $row['UUID'];
                $enlaces->orden =  $row['Orden'];
                $enlaces->nombre = $row['Nombre'];
                $enlaces->link = $row['Link'];
                $enlaces->etiquetas = $row['Etiqueta'] ;
                $enlaces->ubicasion = $row['Ubicasion'];
            }
            return $enlaces;
        }catch(\PDOException $e){
            $this->errorsLogs($e,'enlacesModel_getLink');
            return $enlaces;
        }
    }
}