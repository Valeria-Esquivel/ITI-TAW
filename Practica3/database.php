<?php
class Database(){
    private $con;
    private $dbhost="localhost";
    private $dbuser="root";
    private $dbpass="root";
    private $dbname="tuto_poo";

    function __construct(){
        $this->con=mysqli_connect($this->bdhost, $this->bduser, $this->bdpass, $this->bdname);
        if(mysqli_connect_error()){
            die("conexion a la base de datos fallo".mysqli_connect_error().mysqli_connect_errno());

        }
    }
    public function sanitize($var){
        $return =
    }
}


?>