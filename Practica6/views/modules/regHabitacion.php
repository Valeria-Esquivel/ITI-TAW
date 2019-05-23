<h1>REGISTRO DE CLIENTES</h1>

<form method="post" enctype="multipart/form-data" >
	
	<input type="text" placeholder="Habitacion" name="habitacion" required>

	<input type="text" placeholder="precio" name="precio" required>
    FOTO <input type="file" name="imagen" required>

    
	<input type="submit" value="Enviar">

</form>

<?php

$regProducto = new MvcController();
$regProducto -> registroHabitacionesController();

if(isset($_GET["action"])){

	if($_GET["action"] == "habitaciones"){

		echo "Registro Exitoso";
	
	}

}

?>
