<?php

session_start();

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
		$editarUsuario = new MvcController();
		$editarUsuario -> editarReservaController();
		$editarUsuario -> actualizarReservaController();

	}



	?>

</form>



