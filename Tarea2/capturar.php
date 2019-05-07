<?php
require "tarea_2.php";

$matricula=$_POST["txtmatricula"];
$nombre=$_POST["txtnombre"];
$carrera=$_POST["txtcarrera"];
$email=$_POST["txtemail"];
$telefono=$_POST["txttelefono"];

$noEmpleado=$_POST["txtnoEmpleado"];
$nombrM=$_POST["txtnombreM"];
$carreraM=$_POST["txtcarreraM"];
$telefonoM=$_POST["txttelefonoM"];


echo $matricula;
if($matricula>=0){
$sql="insert into alumnos(matricula,nombre,carrera,email,telefono) values ('$matricula','$nombre','$carrera','$email','$telefono')";

$obj=new BD();
$obj->insertar($sql);}

if($noEmpleado>=0){
    $sql2="insert into maestros(`no.Empleado`,carrera,nombre,telefono) values ('$noEmpleado','$carreraM','$nombrM','$telefonoM')";
    echo $sql2;
    $obj=new BD();
    $obj->insertar($sql2);}




?>