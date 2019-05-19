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

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array( "usuario"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"],
								      "email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=usuarios");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>

			 <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>

			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"],
				                      "email"=>$_POST["emailEditar"]);
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	
	}

	#VISTA DE Productos
	#------------------------------------

	public function vistaProductosController(){

		$respuesta = Datos::vistaProductosModel("productos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["precio"].'</td>
				<td><a href="index.php?action=editarP&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=productos&idBorrarP='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	#EDITAR Producto
	#------------------------------------

	public function editarProductoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductoModel($datosController, "productos");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditarP">

			 <input type="text" value="'.$respuesta["nombre"].'" name="productoEditar" required>

			 <input type="text" value="'.$respuesta["precio"].'" name="precioEditar" required>

			 <input type="submit" value="Actualizar">';

	}
//calcular ganancias y promedio
public function gananciasPromedioController(){

	$datosController = $_POST["fechas"];
	
	$respuesta = Datos::calcularModel($datosController, "ventas");
	
	$gan=0;
	
	foreach($respuesta as $row => $item){
		$gan=$gan+$item["total_pago"];
	}
	echo "TOTAL GANADO POR DIA: ";
	echo $gan;


}

    #ACTUALIZAR Producto
	#------------------------------------
	public function actualizarProductoController(){

		if(isset($_POST["productoEditar"])){

			$datosController = array( "id"=>$_POST["idEditarP"],
							          "nombre"=>$_POST["productoEditar"],
				                      "precio"=>$_POST["precioEditar"],
				                      );
			
			$respuesta = Datos::actualizarProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=productos");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarProductosController(){

		if(isset($_GET["idBorrarP"])){

			$datosController = $_GET["idBorrarP"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=productos");
			
			}

		}

	
	}

		#REGISTRO DE PRODUCTOS
	#------------------------------------
	public function registroProductoController(){

		if(isset($_POST["productoRegistro"])){

			$datosController = array( "nombre"=>$_POST["productoRegistro"], 
								      "precio"=>$_POST["precioRegistro"],
								     );

			$respuesta = Datos::registroProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=productos");

			}

			else{

				header("location:index.php");
			}

		}

	}
	

	#VISTA DE VENTAS
	#------------------------------------

	public function vistaVentasController(){

		$respuesta = Datos::vistaProductosModel("ventas");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["id_usuario"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["total_pago"].'</td>
				<td><a href="index.php?action=detalle_venta&idVD='.$item["id"].'"><button>Ver</button></a></td>
				<td><a href="index.php?action=ventas&idBorrarV='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	public function borrarVentasController(){

		if(isset($_GET["idBorrarV"])){

			$datosController = $_GET["idBorrarV"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "ventas");

			if($respuesta == "success"){

				header("location:index.php?action=ventas");
			
			}

		}

	
	}

	public function vistaVDController(){
		$datosController = $_GET["idVD"];
		$respuesta = Datos::vistaVDModel($datosController, "detalles_ventas");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["id_venta"].'</td>
				<td>'.$item["id_producto"].'</td>
				<td>'.$item["nombre_producto"].'</td>
				<td>'.$item["precio_producto"].'</td>
				<td>'.$item["cantidad_producto"].'</td>
				<td>'.$item["total"].'</td>
				
			</tr>';

		}

	}
	
	public function nuevaVentaController(){
			$idVenta=$_POST["id_venta"];
			$idUsuario=$_POST["usuarioVenta"];
			$fecha=$_POST["fecha"];
			
			$datosController = $_POST["id_producto"];
			$res = Datos:: editarProductoModel($datosController,"productos");
			if($res!=NULL){


				echo'<h4>id producto: <input type="text" value="'.$res["id"].'" name="idEditarV"></h4>
				<h4>Producto:<input type="text" value="'.$res["nombre"].'" name="productoEditarV" required></h4>
				<h4>Precio: <input type="text" value="'.$res["precio"].'" name="precioEditarV"  required></h4>
				<input type="text" value="'.$res["precio"].'" name="precioEditarV" required></h4>
				<input type="text" placeholder="Cantidad del Producto" name="cantidad" required>
				<input type="submit" value="Enviar">';
				Agregarventa();
			}

			


		


	
	}

	public function Agregarventa(){
		
		$total=$_POST["precioEditarV"]*$_POST["cantidad"]+1;
		echo $idVenta;

		if(isset($_POST["productoEditarV"])){

			$datosController = array( "id"=>$idVenta,
							          "id_usuario"=>$idUsuario,
									  "fecha"=>$fecha,
									  "total_pago"=>$total,
				                      );
			
			$respuesta = Datos::registroVentasModel($datosController, "ventas");

			

			if($respuesta == "success"){

			  echo "exito";

			}

			else{

				echo "error";

			}

		}
	
	}

	public function AgregarventaD(){
		
		$total=$_POST["precioEditarV"]*$_POST["cantidad"];
		//echo $_POST["precioEditarV"];

		if(isset($_POST["productoEditarV"])){

			

				$datosController = array( "id_venta"=>$idVenta,
										  "id_producto"=>$_POST["idEditarV"],
										  "nombre_producto"=>$_POST["productoEditarV"],
										  "precio_producto"=>$_POST["precioEditarV"],
										  "cantidad_producto"=>$_POST["cantidad"],
										  "total"=>$total,
										  );
				
				$respuesta = Datos::registroVentasDModel($datosController, "detalles_ventas");
	
				
			

			if($respuesta == "success"){

			  header("location:index.php?action=ventas");

			}

			else{

				echo "error";

			}

		}
	
	}
	

	



}

?>