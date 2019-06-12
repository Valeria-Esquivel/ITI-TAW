<?php

class Conexion{

	public function conectar(){
	
		
		
		$link = new PDO("mysql:host=localhost;dbname=catalogo","admin","d58003b488046802fee2e1f4a0e677c154a2b621ba0725da");
		
		
		
		return $link;

    }
    

}

?>
