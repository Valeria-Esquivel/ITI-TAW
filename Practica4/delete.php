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

<?php
//incluye los metodos y funciones del archivo database.php
    include ("database.php");
    //se trea el id de registro seleccionado de index.php       
    $id=$_GET["eliminar"];
    //se crea objeto de la clase database()
    $clientes =  new Database();
    //se llama al metodo delete para hacer la cosnulta a la BD       
    $res = $clientes->delete($id);
    //se crean mensajes de alerta si se realizo con exito o no la consulta a la BD    
    if ($res) {
      $message = "Registro Eliminado";
      $class = "alert alert-success";
    }else{
      $message="No se pudo Eliminar con exito";
      $class="alert alert-danger";
    }


?>
<div class="<?php echo $class?>">
<?php echo $message;?>
</div>     
</body>
</html>