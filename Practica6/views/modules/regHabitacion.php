<h1>REGISTRO DE HABITACIONES</h1>

<form method="post" enctype="multipart/form-data" >
	
	<input type="text" placeholder="Habitacion" name="habitacion" required>

	<input type="text" placeholder="precio" name="precio" required>
    FOTO <input type="file" name="imagen" required>

    
	<input type="submit" value="Enviar">


</form>

<?php

$regHab = new MvcController();
$regHab -> registroHabitacionesController();//utiliza la el metodo de la clase MvcController de controller/controller.php

if(isset($_GET["action"])){

	if($_GET["action"] == "habitaciones"){

		echo "Registro Exitoso";
	
	}

}

?>
