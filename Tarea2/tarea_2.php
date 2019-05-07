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
   //trae las filas de la base de datos
    function select($sql){
        $resultado=mysql_query($sql);
        $data=NULL;
        while($fila=mysql_fetch_assoc($resultado)){
            
            $data[]=$fila;
        }
        return $data;
    }
    //metodo para insertar una fila en la base de datos
    function insertar($sql){
        mysql_query($sql);
        if(mysql_affected_rows($this->conexion)<=0){
          //  echo "No se pudo";
        
        }else{
           // echo "si se pudo";
        }
    }

   
    
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulario en PHP</title>
</head>

<body>

<?php
//objeto de clase
$obj =new BD();
//guarda todos los datos de la tabla alumnos
$datos=$obj->select("select * from alumnos");
//guarda todos los datos de la tabla maestros
$datos_M=$obj->select("select * from maestros");
?>

<h1> Formularios </h1>
<form method="post" action="capturar.php">
<table>
<tr>
   <td>Matricula: </td>
   <td> <input type="text" name="txtmatricula"   /></td>
   
</tr>
<tr>
   <td>Nombre: </td>
   <td><input type="text" name="txtnombre" /></td>
</tr>
<tr>
   <td>Carrera: </td>
   <td><input type="text" name="txtcarrera" /></td>
</tr>
<tr>
   <td>Email: </td>
   <td><input type="text" name="txtemail" /></td>
</tr>
<tr>
   <td>Telefono: </td>
   <td><input type="text" name="txttelefono" /></td>
</tr>
<tr>
   <td><input type="submit" value="INSERTAR"  /></td>
</tr>
</table>
<table>
<tr>
   <td>Numero de empleado: </td>
   <td> <input type="text" name="txtnoEmpleado"   /></td>
   
</tr>
<tr>
   <td>Carrera: </td>
   <td><input type="text" name="txtcarreraM" /></td>
</tr>
<tr>
   <td>Nombre: </td>
   <td><input type="text" name="txtnombreM" /></td>
</tr>
<tr>
   <td>Telefono: </td>
   <td><input type="text" name="txttelefonoM" /></td>
</tr>
<tr>
   <td><input type="submit" value="INSERTAR"  /></td>
</tr>
</table>

</form>





<table border="1">
<h2>Tabla Alumnos:</h2>
<tr>
<td>Matricula</td>
<td>Nombre</td>
<td>carrera</td>
<td>Email</td>
<td>Telefono</td>
</tr>

<?php foreach($datos as $fila){?>
    <tr>
<td><?php echo $fila["matricula"]?></td>
<td><?php echo $fila["nombre"]?></td>
<td><?php echo $fila["carrera"]?></td>
<td><?php echo $fila["email"]?></td>
<td><?php echo $fila["telefono"]?></td>
</tr>
<?php }?>


</table>

<h2>Tabla Maestros:</h2>
<table border="1">
<tr>
<td> No.Empleado </td>
<td> Carrera </td>
<td> Nombre </td>
<td> Telefono </td>
</tr>

<?php foreach($datos_M as $fila){?>
    <tr>
<td><?php echo $fila["no.Empleado"]?></td>
<td><?php echo $fila["carrera"]?></td>
<td><?php echo $fila["nombre"]?></td>
<td><?php echo $fila["telefono"]?></td>
</tr>
<?php }?>

</table>

<ul>
    <li><a href="#">Volver al Inicio</a></li>
</ul>
</body>
</html>