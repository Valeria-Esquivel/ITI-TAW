<?php

class Conexion{
	public function conectar(){
		$Otp = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
		$link = new PDO("mysql:host=localhost;dbname=tutorias;port=3307","root","usbw", $Otp);
		return $link;

	}

}


//Verificar conexión correcta
$a= new Conexion();
$a -> conectar();

?>
