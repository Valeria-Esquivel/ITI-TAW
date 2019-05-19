<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>VENTAS</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>ID</th>
				<th>Id_Venta</th>
				<th>Id_producto</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad vendida</th>
                <th>Total</th>
				

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaVentas = new MvcController();
			$vistaVentas -> vistaVDController();
			

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
