<h1>REGISTRO DE GRUPOS</h1>

<form method="post">
	
	<input type="text" placeholder="Codigo" name="codigo" required>
	<input type="text" placeholder="Carrera" name="carrera" required>
	<input type="submit"  class="btn btn-secondary"value="Enviar">

</form>

<?php

$registro = new MvcController();
$registro -> registroGruposController();//utiliza la el metodo de la clase MvcController de controller/controller.php

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
