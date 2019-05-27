<h1>INGRESAR</h1>

	<form method="post">
		
		<input type="text" placeholder="Usuario" name="usuarioIngreso" required>

		<input type="password" placeholder="Password" name="passwordIngreso" required>

		<input type="submit" value="Enviar">

	</form>
	


<?php

$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();//utiliza la el metodo de la clase MvcController de controller/controller.php


if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>