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
                <th> Numero de reserva </th>
                <th>Numero de cliente</th>
				<th>numero de habitacion</th>
				<th>fecha de entrada</th>
                <th>Dias de reserva</th>
                <th>Pago Total</th>
                <td><center><a href="index.php?action=regHabitacion&idus=1">
				<img src="imagenes/iconoG1.png" alt="Enviar" width="30" height="30"></center></a>
                
                </td>
   


			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaReservasController();
			$vistaUsuario ->  borrarReservasController();

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