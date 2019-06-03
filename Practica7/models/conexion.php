<?php

class Conexion{

	public function conectar(){
		//conexion con la base de datos
		
		$Otp = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
		$link = new PDO("mysql:host=localhost;dbname=tg;port=3307","root","usbw", $Otp);
		
		
		return $link;

    }
    

}

?>
