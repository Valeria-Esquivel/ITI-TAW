<?php

session_start();
//valida el acceso del usuario
if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>EDITAR RESERVACIONES</h1>

<form method="post">
	
	<?php
	$us=0;
	$us=$_GET["idus"];
	if($us==1){
		$editarReservas = new MvcController();
		$editarReservas -> editarReservaController();//utiliza la el metodo de la clase MvcController de controller/controller.php
		$editarReservas -> actualizarReservaController();

	}



	?>

</form>



