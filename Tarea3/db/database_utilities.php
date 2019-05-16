<?php
    require_once('database_credentials.php');
    //conexion a la base de datos
    function connect_db(){
        $dbhost = DB_HOST; 
        $dbname = DB_DATABASE; 
        $dbuser= DB_USER;
        $dbpass=DB_PASSWORD;
        $Otp = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
        $sql = new PDO("mysql:host={$dbhost};dbname={$dbname};port=3307", $dbuser, $dbpass, $Otp);
        return $sql;
		}
		//funcion para selecionar los usuarios de la BD
    function users(){
		global $db;
		$db = connect_db();
		$sql = $db->prepare("SELECT * FROM usuarios");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
		}
		//funcion para selecionar los tipos usuarios de la BD
    function tipos(){
		global $db;
		$db =connect_db();
		$sql = $db->prepare("SELECT * FROM tipo_usuario");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
	}

	//funcion para selecionar Status la BD
    function status(){
		global $db;
		$db = connect_db();
		$sql = $db->prepare("SELECT * FROM `status`");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
    }
   /* function status(){
		global $db;
		$db = connect_db();
		$sql = $db->prepare("SELECT * FROM `status`");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
		}*/
		
		//funcion para traer el inicio de la BD
    function logs(){
		global $db;
		$db = connect_db();
		$sql = $db->prepare("SELECT * FROM inicio");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
    }
    //funcion para seleccionar el status activo de la tabla usuarios de la BD
    function activos(){
		global $db;
		$db = connect_db();
		$sql = $db->prepare("SELECT * FROM usuarios WHERE id_status=1");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
		}
		//funcion para seleccionar el status inactivo de la tabla usuarios de la BD
    function inactivos(){
		global $db;
		$db = connect_db();
		$sql = $db->prepare("SELECT * FROM usuarios WHERE id_status=1");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
    }
    //funion para traer todos los registros de la tabla que recibe como parametro 
    function tabla($nombre){
        global $db;
	    	$db = connect_db();
        $sql = $db->prepare("SELECT * FROM `$nombre`");
        $sql -> execute();
        
		//$res = $sql->rowCount();
		return $sql;
    }

?>