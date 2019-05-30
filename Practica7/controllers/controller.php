<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		//llama al archivo template.php
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

    //VISTA DE ALUMNOS
	#------------------------------------

	public function vistaAlumnosController(){

		$respuesta = Datos::vistas("alumnos");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
        //foreach iterra sobre el array de datos de la tabla clientes de la BD
		foreach($respuesta as $row => $item){
		echo'<tr>
		        <td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["apellido"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["email"].'</td> 
				<td><a href="index.php?action=editarA&idEd='.$item["id"].'">
					<img src="imagenes/iconoE.png" alt="Enviar" width="20" height="20"></a>
					<a href="index.php?action=alumnos&idBorrar='.$item["id"].'">
					<img src="imagenes/delete.png" alt="Enviar" width="20" height="20"></a></a></td></tr>';
		}

	}
	 //VISTA DE ALUMNOS
	#------------------------------------

	public function vistaMaestrosController(){

		$respuesta = Datos::vistas("maestros");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
        //foreach iterra sobre el array de datos de la tabla clientes de la BD
		foreach($respuesta as $row => $item){
		echo'<tr>
		        <td>'.$item["no.empleado"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["apellido"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["email"].'</td> 
				<td><a href="index.php?action=editarM&idEd='.$item["id"].'">
					<img src="imagenes/iconoE.png" alt="Enviar" width="20" height="20"></a>
					<a href="index.php?action=maestros&idBorrar='.$item["id"].'">
					<img src="imagenes/delete.png" alt="Enviar" width="20" height="20"></a></a></td></tr>';
		}

	}


	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroAlumnosController(){
       //comprueba se hayan ingresado los datos del usuario
		if(isset($_POST["matricula"])){
         //almacena los datos ingresados en un array y los envia models/crud.php para realizar la sentencia sql a la base de datos
			$datosController = array( "matricula"=>$_POST["matricula"],
			                           "nombre"=>$_POST["nombre"], 
								      "apellido"=>$_POST["apellido"],
								      "carrera"=>$_POST["carrera"],
								       "email"=>$_POST["email"],
								      );

			$respuesta = Datos::registroAlumnosModel($datosController, "alumnos");
            //comprueba que los datos ingresados fueran almacenados de forma exitosa
			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroMaestrosController(){
       //comprueba se hayan ingresado los datos del usuario
		if(isset($_POST["empleado"])){
         //almacena los datos ingresados en un array y los envia models/crud.php para realizar la sentencia sql a la base de datos
			$datosController = array( "empleado"=>$_POST["empleado"],
			                           "nombre"=>$_POST["nombre"], 
								      "apellido"=>$_POST["apellido"],
								      "carrera"=>$_POST["carrera"],
								       "email"=>$_POST["email"],
								      );

			$respuesta = Datos::registroMaestrosModel($datosController, "maestros");
            //comprueba que los datos ingresados fueran almacenados de forma exitosa
			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}
	#EDITAR ALUMNOS
	#------------------------------------

	public function editarAlumnosController(){
        //se consulta el registro segun el id obtenido con la funcion GET
		$datosController = $_GET["idEd"];
		$respuesta = Datos::editar($datosController, "alumnos");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditarA">
		 <input type="text" value="'.$respuesta["matricula"].'" name="AmatriculaEditar" required>

			 <input type="text" value="'.$respuesta["nombre"].'" name="AnombreEditar" required>

			 <input type="text" value="'.$respuesta["apellido"].'" name="AapellidoEditar" required>

			 <input type="text" value="'.$respuesta["carrera"].'" name="AcarreraEditar" required>
			 <input type="text" value="'.$respuesta["email"].'" name="AemailEditar" required>

			 <input type="submit" value="Actualizar">';

	}
	#EDITAR ALUMNOS
	#------------------------------------

	public function editarMaestrosController(){
        //se consulta el registro segun el id obtenido con la funcion GET
		$datosController = $_GET["idEd"];
		$respuesta = Datos::editar($datosController, "maestros");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditarM">

			 <input type="text" value="'.$respuesta["no.empleado"].'" name="nEditar" required>
			  <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditarM" required>

			 <input type="text" value="'.$respuesta["apellido"].'" name="apellidoEditarM" required>

			 <input type="text" value="'.$respuesta["carrera"].'" name="carreraEditarM" required>
			 <input type="text" value="'.$respuesta["email"].'" name="emailEditarM" required>

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR CLIENTE
	#------------------------------------
	public function actualizarAlumnosController(){
      //comprueba se hayan ingresado los datos del cliente
		if(isset($_POST["idEditarA"])){

			$datosController = array( "id"=>$_POST["idEditarA"],
							          "matricula"=>$_POST["AmatriculaEditar"],
			                          "nombre"=>$_POST["AnombreEditar"], 
								      "apellido"=>$_POST["AapellidoEditar"],
								      "carrera"=>$_POST["AcarreraEditar"],
								      "email"=>$_POST["AemailEditar"],
				                  );
			
			$respuesta = Datos::actualizarAlumnosModel($datosController, "alumnos");
           //comprueba que los datos ingresados fueran almacenados de forma exitosa
			if($respuesta == "success"){

				header("location:index.php?action=alumnos");

			}

			else{

				echo "error";

			}

		}
	
	}
#ACTUALIZAR CLIENTE
	#------------------------------------
	public function actualizarMaestrosController(){
      //comprueba se hayan ingresado los datos del cliente
		if(isset($_POST["idEditarM"])){

			$datosController = array( "id"=>$_POST["idEditarM"],
							          "matricula"=>$_POST["nEditar"],
			                          "nombre"=>$_POST["nombreEditarM"], 
								      "apellido"=>$_POST["apellidoEditarM"],
								      "carrera"=>$_POST["carreraEditarM"],
								      "email"=>$_POST["emailEditarM"],
				                  );
			
			$respuesta = Datos::actualizarMaestrosModel($datosController, "maestros");
           //comprueba que los datos ingresados fueran almacenados de forma exitosa
			if($respuesta == "success"){

				header("location:index.php?action=maestros");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR CLIENTES
	#------------------------------------
	public function borrarAlumnosController(){

		if(isset($_GET["idBorrar"])){
            //se borra el registro segun el id obtenido con la funcion GET
			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrar($datosController, "alumnos");
			
			
			if($respuesta == "success"){

				header("location:index.php?action=alumnos");
			
			}

		}

	
	}
	#BORRAR CLIENTES
	#------------------------------------
	public function borrarMaestrosController(){

		if(isset($_GET["idBorrar"])){
            //se borra el registro segun el id obtenido con la funcion GET
			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrar($datosController, "maestros");
			
			
			if($respuesta == "success"){

				header("location:index.php?action=alumnos");
			
			}

		}

	
	}


}