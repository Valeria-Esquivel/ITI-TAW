

<?php
class BD{
  
    function __construct(){
        try{
        //propiedades
        $host="localhost";
        $db_name="formulario";
        $user="root";
        $pass="usbw";
        

        //conexion con la base de datos
        $this->conexion=mysql_connect($host,$user,$pass) or die ("Error en la conexion");
        //selecciona la bd
        mysql_select_db($db_name) or die ("no se encontro bd");
       // mysqli_select_db($this->conexion,$db_name) or die ("no se encontro bd");
       
        echo"bien";
        }catch(Exception $ex){
            throw $ex;
        }
    }
    //metodo para insertar una fila en la base de datos
    function insertar($sql){
        mysql_query($sql);
        if(mysql_affected_rows($this->conexion)<=0){
            echo "No se pudo conectar con la BD";
        
        }else{
            echo "Se conecto con la BD";
        }
    }

    
}


class Persona{
    //propiedades
    public $edad;
    public $altura;
    public $peso;


    //definir metodo obtencion de datos
    //getters
    public function getEdad(){
        return $this->edad;
    }
    public function getPeso(){
        return $this->peso;
    }
    public function getAltura(){
        return $this->altura;
    }

    //definir Metodos asignacion de datos
    //setters
    public function setEdad($valor){
        $this->edad=$valor;
    }
    public function setAltura($valor){
        $this->altura=$valor;
    }
    public function setPeso($valor){
        $this->peso=$valor;
    }

    //metodo de clalculo del inice de masa corporal accediendo a las propiedades
    public function imc(){
        return $this->peso/($this->altura*$this->altura);
    }

    //calcula IMC accediendo mediante los metodos get
    public function imc2(){
        return $this->getPeso() /  ($this->getAltura()*$this->getAltura());
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario en PHP</title>
</head>

<body>
<h1> Formularios </h1>
<form method="post" action="index.php">
<table>
<tr>
   <td>Edad: </td>
   <td> <input type="text" name="txtedad"   /></td>
   
</tr>
<tr>
   <td>Altura: </td>
   <td><input type="text" name="txtaltura" /></td>
</tr>
<tr>
   <td>Peso: </td>
   <td><input type="text" name="txtpeso" /></td>
</tr>
<tr>
   <td><input type="submit" value="Calcular"  /></td>
</tr>

</table>

</body>
</html>