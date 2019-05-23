<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>Habitaciones</h1>

	<table border="1">
		
		<thead>
			
			<tr>
                <th>Numero de Habitacion</th>
				<th>Habitacion</th>
				<th>precio</th>
                <td><center><a href="index.php?action=regHabitacion&idus=1">
				<img src="imagenes/iconoG1.png" alt="Enviar" width="30" height="30"></center></a>
                
                </td>
				
                


			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaHabitacionesController();
			$vistaUsuario -> borrarHabitacionesController();

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
