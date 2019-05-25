<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}
        error_reporting(0);
		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

    }
    	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "nombre"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			if($respuesta["nombre"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;

				$us= $respuesta["tipo_usuario"];
				if($us==2){
					header("location:index.php?action=usuarios&idus=2");
				}else if($us==1){
					header("location:index.php?action=usuarios&idus=1");
				}
				

				
				
			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}
	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array( "tipo_usuario"=>$_POST["emailRegistro"],
			                           "nombre"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"],
								      );

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}
	#VISTA DE CLIENTES
	#------------------------------------

	public function vistaClientesController(){

		$respuesta = Datos::vistas("clientes");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
        
		foreach($respuesta as $row => $item){
		echo'<tr>
		        <td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["apellido"].'</td>
				<td>'.$item["tipo"].'</td>
				<td><a href="index.php?action=editarC&idus=1&idEd='.$item["id"].'">
				<img src="imagenes/iconoE.png" alt="Enviar" width="20" height="20"></a>
				<a href="index.php?action=clientes&idus=1&idBorrar='.$item["id"].'">
				<img src="imagenes/delete.png" alt="Enviar" width="20" height="20"></a></a></td>
			</tr>';

		}

	}

		#BORRAR CLIENTES
	#------------------------------------
	public function borrarClientesController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrar($datosController, "clientes");
			echo $respuesta;
			
			if($respuesta == "success"){

				header("location:index.php?action=clientes&idus=1");
			
			}

		}

	
	}


	#REGISTRO DE CLIENTES
	#------------------------------------
	public function registroClientesController(){

		if(isset($_POST["Nombre"])){

			$datosController = array( "nombre"=>$_POST["Nombre"], 
									  "apellido"=>$_POST["Apellido"],
									  "tipo"=>$_POST["Tipo"],
								     );

			$respuesta = Datos::registroClientesModel($datosController, "clientes");

			if($respuesta == "success"){

				header("location:index.php?action=clientes&idus=1");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#EDITAR CLIENTE
	#------------------------------------

	public function editarClientesController(){

		$datosController = $_GET["idEd"];
		$respuesta = Datos::editar($datosController, "clientes");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			 <input type="text" value="'.$respuesta["apellido"].'" name="apellidoEditar" required>

			 <input type="text" value="'.$respuesta["tipo"].'" name="tipoEditar" required>

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR CLIENTE
	#------------------------------------
	public function actualizarClientesController(){

		if(isset($_POST["idEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "nombre"=>$_POST["nombreEditar"],
				                      "apellido"=>$_POST["apellidoEditar"],
				                      "tipo"=>$_POST["tipoEditar"]);
			
			$respuesta = Datos::actualizarClientesModel($datosController, "clientes");

			if($respuesta == "success"){

				header("location:index.php?action=clientes&idus=1");

			}

			else{

				echo "error";

			}

		}
	
	}

	#VISTA DE HABITACIONES
	#------------------------------------

	public function vistaHabitacionesController(){

		$respuesta = Datos::vistas("habitaciones");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
        
		foreach($respuesta as $row => $item){
		echo'<tr>
		        <td>'.$item["id"].'</td>
				<td>'.$item["tipo_habitacion"].'</td>
				<td>'.$item["precio"].'</td>
				
				<td><a href="index.php?action=editarH&idus=1&idEdH='.$item["id"].'">
				<img src="imagenes/iconoE.png" alt="Enviar" width="20" height="20"></a>
				<a href="index.php?action=habitaciones&idus=1&idBorrarH='.$item["id"].'">
				<img src="imagenes/delete.png" alt="Enviar" width="20" height="20"></a>
				<a href="index.php?action=verHabitacion&idus=1&idVH='.$item["id"].'">
				<img src="imagenes/ver.png" alt="Enviar" width="20" height="20"></a></td>
			</tr>';

		}

	}
	
	#REGISTRO DE HABITACIONES
	#------------------------------------
	public function registroHabitacionesController(){
		$foto=$_FILES["imagen"]["name"];
		$ruta=$_FILES["imagen"]["tmp_name"];
        $destino="imagenes/".$foto;
		copy($ruta,$destino);
		
		

		if(isset($_POST["habitacion"])){

			$datosController = array( "tipo_habitacion"=>$_POST["habitacion"], 
									  "precio"=>$_POST["precio"],
									  "imagen"=>$destino,
									 
									 );
			

			$respuesta = Datos::registroHabitacionesModel($datosController, "habitaciones");

			if($respuesta == "success"){

				header("location:index.php?action=habitaciones&idus=1");

			}

			else{

				header("location:index.php?action=habitaciones&idus=1");
			}

		}

	}

	#BORRAR HABITACIONES
	#------------------------------------
	public function borrarHabitacionesController(){

		if(isset($_GET["idBorrarH"])){

			$datosController = $_GET["idBorrarH"];
			
			$respuesta = Datos::borrar($datosController, "habitaciones");
			echo $respuesta;
			
			if($respuesta == "success"){

				header("location:index.php?action=habitaciones&idus=1");
			
			}

		}

	
	}

	#EDITAR HABITACION
	#------------------------------------

	public function editarHabitacionesController(){

		$datosController = $_GET["idEdH"];
		$respuesta = Datos::editar($datosController, "habitaciones");

		echo'<form method="post" enctype="multipart/form-data" >
			 <input type="hidden" value="'.$respuesta["id"].'" name="idEditarH">
			 
			 <center>
			 <a href="index.php?action=editarH&idus=1&idEdH='.$item["id"].'">
			 <img src="'.$respuesta["img_hotel"].'" alt="Enviar" width="300" height="200">
			 </center>	
			 		
			 <input type="text" value="'.$respuesta["tipo_habitacion"].'" name="habitacionEditar" required>

			 <input type="text" value="'.$respuesta["precio"].'" name="precioEditar" required>

			 <input type="submit" value="Actualizar">
			 </form>
			 ';

	}

	#ACTUALIZAR HABITACION
	#------------------------------------
	public function actualizarHabitacionesController(){

		

		if(isset($_POST["idEditarH"])){

			$datosController = array( "id"=>$_POST["idEditarH"],
							          "tipo_habitacion"=>$_POST["habitacionEditar"], 
									  "precio"=>$_POST["precioEditar"],
									  );
			
			$respuesta = Datos::actualizarHabitacionesModel($datosController, "habitaciones");

			if($respuesta == "success"){

				header("location:index.php?action=habitaciones&idus=1");

			}

			else{

				echo "error";

			}

		}
	
	}

	#ver HABITACION
	#------------------------------------

	public function verHabitacionesController(){

		$datosController = $_GET["idVH"];
		$respuesta = Datos::editar($datosController, "habitaciones");
		

		echo'<table border="0">
		<thead>
		<center>
		<img src="'.$respuesta["img_hotel"].'" alt="Enviar" width="400" height="200">
		<br/>
		<br/>
		<br/>
		
			<tr>
                <th><center>Numero de Habitacion: </center></th>
				<th><center>'.$respuesta["id"].'</center></th>
			</tr>
			<tr>
                <th><center>Habitacion:  </center></th>
				<th><center>'.$respuesta["tipo_habitacion"].' </center></th>
			</tr>
			<tr>
			<th><center>Precio </center></th>
			<th><center>'.$respuesta["precio"].' </center></th>
			</tr>
			
		</thead>
		</table>';
		
	}

	#VISTA DE HABITACIONES
	#------------------------------------

	public function vistaReservasController(){

		$respuesta = Datos::vistas("reservas");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
        
		foreach($respuesta as $row => $item){
		echo'<tr>
		        <td>'.$item["id"].'</td>
				<td>'.$item["id_cliente"].'</td>
				<td>'.$item["id_habitacion"].'</td>
				<td>'.$item["fecha_entrada"].'</td>
				<td>'.$item["dias_reserva"].'</td>
				<td>'.$item["pago_total"].'</td>
	
				<td><a href="index.php?action=editarR&idus=1&idEdR='.$item["id"].'">
				<img src="imagenes/iconoE.png" alt="Enviar" width="20" height="20"></a>
				<a href="index.php?action=reservas&idus=1&idBorrarR='.$item["id"].'">
				<img src="imagenes/delete.png" alt="Enviar" width="20" height="20"></a>
				<a href="index.php?action=verReserva&idus=1&idVR='.$item["id"].'">
				<img src="imagenes/ver.png" alt="Enviar" width="20" height="20"></a></td>
			</tr>';

		}

	}

	#BORRAR HABITACIONES
	#------------------------------------
	public function borrarReservasController(){

		if(isset($_GET["idBorrarR"])){

			$datosController = $_GET["idBorrarR"];
			
			$respuesta = Datos::borrar($datosController, "reservas");
			echo $respuesta;
			
			if($respuesta == "success"){

				header("location:index.php?action=reservas&idus=1");
			
			}

		}

	
	}


		#llenar registro Reservaciones
	#------------------------------------

	public function registroReservasController(){
		$res = Datos::vistas("clientes");
		$res2 = Datos::vistas("habitaciones");
		   echo '<form method="post" >';
           echo '<h4>Cliente: </h4>';
		   echo ' <select name="id_cliente">';
		   foreach($res as $row => $item){
			echo'<option value="'.$item["id"].'">'.$item["nombre"].' '.$item["apellido"].'</option>';
			}
			
			echo '</select>';
			echo '<h4>Habitacion: </h4>';
			echo ' <select name="id_habitacion">';
		   foreach($res2 as $row => $item){
			echo'<option value="'.$item["id"].'">'.$item["tipo_habitacion"].'</option>';
			}
			echo '</select>';
	         echo'
			 <input  type="date" name="fechaR" required>
			 <input type="text" placeholder="Numero de dias de reserva" name="dias_reserva" required>
			 <input type="text" placeholder="Estado de Reserva" name="estado" required>
			 <input type="submit" value="Guardar">
		</form>
			 ';

	}


	#Guardar reservaciones
	#------------------------------------
	public function guardarReservasController(){
		$datosController=$_POST["id_habitacion"];
		$res2 = Datos::editar($datosController, "habitaciones");
		$pago=$res2["precio"]*$_POST["dias_reserva"];
	
		if(isset($_POST["id_cliente"])){

			$datosController = array( "id_cliente"=>$_POST["id_cliente"],
							          "id_habitacion"=>$_POST["id_habitacion"], 
									  "fecha_entrada"=>$_POST["fechaR"],
									  "dias_reserva"=>$_POST["dias_reserva"],
									  "pago_total"=>$pago,
									  "estado"=>$_POST["estado"],
									  );
			
			$respuesta = Datos::registroReservasModel($datosController, "reservas");

			if($respuesta == "success"){

				header("location:index.php?action=reservas&idus=1");

			}

			else{

				echo "error";

			}

		}
	
	}


	#EDITAR HABITACION
	#------------------------------------
	
	public function editarReservaController(){

		$datosController = $_GET["idEdR"];
		$respuesta = Datos::editar($datosController, "reservas");

		echo'<form method="post" enctype="multipart/form-data" >
			 <input type="hidden" value="'.$respuesta["id"].'" name="idEditarR">
			 <input type="text" value="'.$respuesta["id_cliente"].'" name="id_clienteEditar" required>
			 		
			 <input type="text" value="'.$respuesta["id_habitacion"].'" name="id_habitacionEditar" required>
			 <input type="text" value="'.$respuesta["fecha_entrada"].'" name="fecha_entradaEditar" required>
			 <input type="text" value="'.$respuesta["dias_reserva"].'" name="dias_reservaEditar" required>
			 <input type="text" value="'.$respuesta["pago_total"].'" name="pago_totalEditar" required>
			 <input type="text" value="'.$respuesta["estado"].'" name="estadoEditar" required>

			 <input type="submit" value="Actualizar">
			 </form>
			 ';

	}

	#ACTUALIZAR RESERVAS
	#------------------------------------
	public function actualizarReservaController(){
		$ids=$_GET["idEdR"];
		echo $ids;


		if(isset($_POST["id_clienteEditar"])){

			$datosController = array( "id"=>$ids,
									  "id_cliente"=>$_POST["id_clienteEditar"],
									  "id_habitacion"=>$_POST["id_habitacionEditar"],
									  "fecha_entrada"=>$_POST["fecha_entradaEditar"],
									  "dias_reserva"=>$_POST["dias_reservaEditar"],
									  "pago_total"=>$_POST["pago_totalEditar"],
									  "estado"=>$_POST["estadoEditar"],							          
									  );
			var_dump($datosController);
			$respuesta = Datos::actualizarReservacionModel($datosController, "reservas");
			echo $respuesta;

			if($respuesta == "success"){

				header("location:index.php?action=reservas&idus=1");

			}

			else{

				echo "error";

			}

		}
	
	}
    //CALCULAR GANANCIAS POR MES
	public function GananciasController(){
		$mesI=$_POST["mes"].'-01';
		$mesF=$_POST["mes"].'-31';
		$pago_total=0;
		
				
		$res = Datos::consultarG($mesI,$mesF,"reservas");
		foreach($res as $row => $item){
			$pago_total=$pago_total+$item["pago_total"];
		
		}
		echo "Ganancia total del mes: ";
		echo $pago_total;
		echo '<table border=1>';
		echo '<thead>			
		<tr>
			<th>NUMERO RESERVA</th>
			<th>FECHA</th>
			<th>PRECIO</th>
		</tr>
		</thead>';
		echo '<tbody>';
		foreach($res as $row => $item){
			echo'<tr>
			<td>'.$item["id"].'</td>
			<td>'.$item["fecha_entrada"].'</td>
			<td>'.$item["pago_total"].'</td>
			
			</tr>';
		}
			echo '</tbody>
			</table>
			';
			
			

	}





}
?>