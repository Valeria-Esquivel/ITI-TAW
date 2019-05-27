<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>EDITAR USUARIO</h1>

<form method="post">
	
	<?php
	$us=0;
	$us=$_GET["idus"];
	if($us==1){
		$editarC = new MvcController();
		//utiliza la el metodo de la clase MvcController de controller/controller.php

		$editarC -> editarClientesController();
		$editarC -> actualizarClientesController();

	}



	?>

</form>



