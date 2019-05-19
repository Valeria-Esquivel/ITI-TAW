<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>PRODUCTOS</h1>
<li><a href="index.php?action=regProducto"> Nuevo Producto</a></li>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>ID</th>
				<th>Producto</th>
				<th>Precio</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaProductos = new MvcController();
			$vistaProductos -> vistaProductosController();
			$vistaProductos -> borrarProductosController();

			?>
           

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>


