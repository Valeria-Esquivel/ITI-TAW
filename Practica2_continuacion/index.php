<?php 

require "persona.php";


/*$edad=$_POST["txtedad"];
$altura=$_POST["txtaltura"];
$peso=$_POST["txtpeso"];*/

//instanciar las clase Persona
$persona= new Persona();
//asignar valores a las propiedades del objeto
$persona->setEdad($_POST["txtedad"]);
$persona->setAltura($_POST["txtaltura"]);
$persona->setPeso($_POST["txtpeso"]);
$imc=$persona->imc();

//sentencia sql para almacenar los datos en la BD
$sql="insert into imc(edad,peso,altura,imc,id) values ('$persona->edad','$persona->peso','$persona->altura','$imc','NULL')";

//instanciar las clase BD
$obj=new BD();
$obj->insertar($sql);

echo"<br> IMC: ".$imc;

?>