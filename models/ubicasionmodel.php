<?php

namespace Models;

include 'class/ubicasion.php';
use Errors\Logger;


class UbicasionModel extends \Libs\Model {
    
    use Logger;

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $items = [];
        try{
            $ubicasion = new \Models\ClassModel\Ubicasion();
            $query = $this->query('SELECT * FROM public."Ubicasion"');
            while($row = $query->fetch()){
                $ubicasion = new \Models\ClassModel\Ubicasion();
                $ubicasion->id = $row['ID'];
                $ubicasion->nombre = $row['Nombre'];
                array_push($items,$ubicasion);
            }
            return $items;
        }catch(\PDOException $e){
            $this->errorsLogs($e,'errorUbicasionModel_getAll');
            return $items;
            // throw new \PDOException;
        }
    }

    public function getUbicasion($id){
        $ubicasion = new \Models\ClassModel\Ubicasion();
        try{
            $query = $this->prepare('SELECT * FROM public."Ubicasion" WHERE "ID" = :id');
            $query->execute([
                'id' => $id,
            ]);
            while ($row = $query->fetch()){
                $ubicasion->id = $row['ID'];
                $ubicasion->nombre = $row['Nombre'];
            }
            return $ubicasion;
        }catch(\PDOException $e){
            $this->errorsLogs($e,'errorUbicasionModel_getUbicasion');
            return $ubicasion;
        }
    }

    public function newLocation($nombre){
        try{
            $query = $this->prepare('INSERT INTO public."Ubicasion"("Nombre") VALUES (:nombre)');
            $query->execute([
                'nombre'=>$nombre,
            ]);
            return true;
        }catch(\PDOException $e){
            $this->errorsLogs($e,'errorUbicasionModel_PDO_newLocation');
            return false;
        }catch(\Exception $e){
            $this->errorsLogs($e,'errorUbicasionModel_EXCEP_newLocation');
            return false;
        }
    }
    public function deletedUbucasion($id){
        try{
            $query = $this->prepare('DELETE FROM public."Ubicasion" WHERE "ID" = :id');
            $query->execute([
                'id'=>$id
            ]);
            return true;
        }catch(\PDOException $e){
            $this->errorsLogs($e,'errorUbicasionModel_deletedUbucasion');
            return false;
        }
    }

    public function updateUbucasion($datos){
        try{
            $query = $this->prepare('UPDATE public."Ubicasion" SET "Nombre" = :nombre WHERE "ID" = :id');
            $query->execute([
                'id'=>$datos['id'],
                'nombre'=>$datos['nombre'],
            ]);
            return true;
        }catch(\PDOException $e){
            $this->errorsLogs($e,'errorUbicasionModel_updateUbucasion');
            return false;
        }
    }
}