<?php

require_once "conexion.php";

class Datos extends Conexion{

    public function vistas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		
		return $stmt->fetchAll();

		$stmt->close();

	}

public function vistasid($tabla,$id){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM `$tabla` where id = $id ");	
    $stmt->execute();
    
    
    return $stmt->fetchAll();
    
    $stmt->close();
    
    }

}


?>