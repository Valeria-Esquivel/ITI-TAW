<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>RESERVACIONES</h1>

<form method="post">
	
	<?php
	
	
		$verReserva = new MvcController();
		$verReserva -> verReservaController();





	?>

</form>


