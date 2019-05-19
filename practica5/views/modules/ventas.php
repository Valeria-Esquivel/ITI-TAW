<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>VENTAS</h1>
<li><a href="index.php?action=venta"> Nueva Venta</a></li>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>ID</th>
				<th>Usuario</th>
				<th>Fecha</th>
                <th>Total de pago</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaVentas = new MvcController();
			$vistaVentas -> vistaVentasController();
			$vistaVentas -> borrarVentasController();

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


