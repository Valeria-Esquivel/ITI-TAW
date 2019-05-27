<h1>CALCULAR GANANCIAS</h1>

<form method="post">
    Seleccionar mes:
	
    <input  type="month" name="mes" required>

	<input type="submit" value="Calcular">

</form>

<?php

$gan = new MvcController();
$gan -> GananciasController();//utiliza la el metodo de la clase MvcController de controller/controller.php


if(isset($_GET["action"])){

	if($_GET["action"] == "productos"){

		echo "Registro Exitoso";
	
	}

}

?>