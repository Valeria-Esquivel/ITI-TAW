<h1>REGISTRO DE PRODUCTOS</h1>

<form method="post">
	
	<input type="text" placeholder="Producto" name="productoRegistro" required>

	<input type="text" placeholder="Precio" name="precioRegistro" required>


	<input type="submit" value="Enviar">

</form>

<?php

$regProducto = new MvcController();
$regProducto -> registroProductoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "productos"){

		echo "Registro Exitoso";
	
	}

}

?>
