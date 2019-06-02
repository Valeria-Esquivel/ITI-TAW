<?php

class Conexion{

	public function conectar(){
		//conexion con la base de datos
		
		$Otp = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
		$link = new PDO("mysql:host=localhost;dbname=escolar;port=3306","admin","d58003b488046802fee2e1f4a0e677c154a2b621ba0725da", $Otp);
		
		
		return $link;

    }
    

}

?>
