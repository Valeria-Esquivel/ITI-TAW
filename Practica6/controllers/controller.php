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



}
?>