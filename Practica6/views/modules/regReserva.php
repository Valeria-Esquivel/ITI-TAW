<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>REGISTRO DE RESERVACIONES</h1>

<form method="post">
	
	<?php
	
		$regReserva= new MvcController();
		//utiliza la el metodo de la clase MvcController de controller/controller.php
		$regReserva -> registroReservasController();
		$regReserva -> guardarReservasController();


	?>

</form>


