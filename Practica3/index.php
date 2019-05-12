<!DOCTYPE html>
<html>
<head>
	<meta carset="utf-8">
	<meta http-equiv="X-UA-Compatible" contennt="IE=edge">
	<meta name="viewport" content="width=devce-width, initial-scale=1" >
	<title>CRUD a bd usando POO</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
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
            include ("database.php");
            $clientes =  new Database();
              $res = $clientes->read();
   
           
             ?>
           
           <div class="<?php echo $class?>">
             <?php// echo $message;?>
           </div>
           <div class="row">
               <table border="1">
                   
                   <div class="col-md-6">
                       <tr>
                       
                           <td><center>id</center></td>
                           <td><center>Nombres</center></td>
                           <td><center>Apellidos</td>
                           <td><center>Telefono</center></td>
                           <td><center>Direccion</center></td>
                           <td><center>Correo electronico</center></td>
                           <td><center>Actaulizar/Borrar</center></td>
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
                           <a href="<?php echo "http://localhost:9090/TAW/Practica3/update.php?Registro=".$fila['id'] ?> " ><img src="iconoE.png" alt="Enviar" width="20" height="20"></a>
                
                           <a href="<?php echo "http://localhost:9090/TAW/Practica3/delete.php?eliminar=".$fila['id'] ?> " ><img src="delete.png" alt="Enviar" width="20" height="20"></a></a>  
                        </center>
                          
                           </td>
</tr>
<?php }?>



                        </tr>
                    </div>
                </table>
            </div>       
</body>
</html>

