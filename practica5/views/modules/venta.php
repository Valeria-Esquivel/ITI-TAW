
<h1>Venta</h1>

<form method="post">

    <input type="text" placeholder="id_venta" name="id_venta" required>
    <input type="text" placeholder="Numero de Usuario" name="usuarioVenta" required>
	<input type="date"  name="fecha" min="2018-03-25" max="2058-05-25" step="2"required>
    <input type="text" placeholder="Id producto" name="id_producto" required>
	<input type="submit" value="Enviar">

</form>

<?php
$nVenta = new MvcController();
$nVenta -> nuevaVentaController();
$nVenta -> Agregarventa();




if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
