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
    function users(){
		global $db;
		$db = connect_db();
		$sql = $db->prepare("SELECT * FROM usuarios");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
    }
    function tipos(){
		global $db;
		$db =connect_db();
		$sql = $db->prepare("SELECT * FROM tipo_usuario");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
	}
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
    function logs(){
		global $db;
		$db = connect_db();
		$sql = $db->prepare("SELECT * FROM inicio");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
    }
    
    function activos(){
		global $db;
		$db = connect_db();
		$sql = $db->prepare("SELECT * FROM usuarios WHERE id_status=1");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
    }
    function inactivos(){
		global $db;
		$db = connect_db();
		$sql = $db->prepare("SELECT * FROM usuarios WHERE id_status=1");
		$sql -> execute();
		$res = $sql->rowCount();
		return $res;
    }
    
    function tabla($nombre){
        global $db;
	    	$db = connect_db();
        $sql = $db->prepare("SELECT * FROM `$nombre`");
        
        $sql -> execute();
        
		//$res = $sql->rowCount();
		return $sql;
    }

?>