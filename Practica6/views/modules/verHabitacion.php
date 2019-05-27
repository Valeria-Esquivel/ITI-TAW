<?php

session_start();
//valida el acceso del usuario
if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>HABITACION</h1>

<form method="post">
	
	<?php
	
		$verHab = new MvcController();
		$verHab -> verHabitacionesController(); //utiliza la el metodo de la clase MvcController de controller/controller.php




	?>

</form>


