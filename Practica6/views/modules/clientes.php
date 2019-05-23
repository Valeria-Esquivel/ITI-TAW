<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>CLIENTES</h1>

	<table border="1">
		
		<thead>
			
			<tr>
                <th>Numero de cliente</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Tipo de Cliente</th>

				<td><center><a href="index.php?action=regCliente&idus=1">
				<img src="imagenes/iconoG1.png" alt="Enviar" width="30" height="30"></center></a>
                
                </td>
				
                


			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaClientesController();
			$vistaUsuario -> borrarClientesController();

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
