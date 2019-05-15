<!DOCTYPE html>
<html>
<head>
	<meta carset="utf-8">
	<meta http-equiv="X-UA-Compatible" contennt="IE=edge">
	<meta name="viewport" content="width=devce-width, initial-scale=1" >
	<title>CRUD a bd usando POO</title>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=8ffc0b31bc8d9ff82fbb94689dd1d7ff">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<style type="text/css" class="init"></style>
	<script type="text/javascript" src="/media/js/site.js?_=994321fabf3873df746bb8bbccd1886a"></script>
	<script type="text/javascript" src="/media/js/dynamic.php?comments-page=examples%2Fstyling%2Fbootstrap4.html" async></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
	<script type="text/javascript" class="init">


$(document).ready(function() {
	$('#example').DataTable();
} );
</script>
</head>
<body class="wide comments example dt-example-bootstrap4">

<div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Clientes</b></h2></div>
                      <div class="col-sm-4">
                           <a href=create.php class="btn btn-info add-new"><i
                           class="fa fa-arrow-left"></i>Nuevo Registro</a> 
                      </div>
                </div>
            </div>
            <?php
            //incluye los metodos y funciones del archivo database.php
            include ("database.php");
            $clientes =  new Database();
            //Utiliza el metodo read del archivo database.php para traer todos los registros de la tabla clientes
            $res = $clientes->read();
             ?>
           
           <div class="<?php echo $class?>">
             <?php// echo $message;?>
           </div>
           <div class="row">
           <table id="example" class="table table-striped table-bordered" style="width:100%">
                   
                <thead>
                       <tr>
                       
                           <td><center>id</center></td>
                           <td><center>Nombres</center></td>
                           <td><center>Apellidos</td>
                           <td><center>Telefono</center></td>
                           <td><center>Direccion</center></td>
                           <td><center>Correo electronico</center></td>
                           <td><center>Actaulizar/Borrar</center></td>
                         </tr>
                </thead> 
                      <tbody>
                      <!-- foreach recorre todas las filas del array $res en el cual se almacenaron los datos de la tabla de la base de datos -->
                       <?php foreach($res as $fila){?>
                   
                        <tr>
                            <td><center><?php echo $fila['id'] ?></center></td>
                            <td><center><?php echo $fila["nombres"]?></center></td>
                            <td><center><?php echo $fila["apellidos"]?></center></td>
                            <td><center><?php echo $fila["telefono"]?></center></td>
                            <td><center><?php echo $fila["direccion"]?></center></td>
                            <td><center><?php echo $fila["correo_electronico"]?></center></td>
                            <td>
                           <center>
                           <!-- Se utilizan  imagenes como botones las cuales direccionan a update.php y delete.php -->
                           <a href="<?php echo "http://localhost:9090/TAW/Practica3/update.php?Registro=".$fila['id'] ?> " ><img src="imagenes/iconoE.png" alt="Enviar" width="20" height="20"></a>
                           <a href="<?php echo "http://localhost:9090/TAW/Practica3/delete.php?eliminar=".$fila['id'] ?> " ><img src="imagenes/delete.png" alt="Enviar" width="20" height="20"></a></a>  
                        </center>
                        </tr>
                        <?php }?>
                    </tbody>
                        </tr>
                
                </table>
            </div>       
</body>
</html>

