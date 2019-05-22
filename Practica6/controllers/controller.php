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
				if($us==0){
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


}
?>