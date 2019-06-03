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
	 //VISTA DE MAESTROS
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

	 //VISTA DE MATERIAS
	#------------------------------------

	public function vistaMateriasController(){

		$respuesta = Datos::vistas("materias");
		
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
        //foreach iterra sobre el array de datos de la tabla clientes de la BD
		foreach($respuesta as $row => $item){
			$datosController =$item["id_maestro"];
		    $res = Datos::editar($datosController, "maestros");
		echo'<tr>
		        <td>'.$item["codigo"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$res["nombre"].' '.$res["apellido"].'</td>
				
				<td> <a href="index.php?action=agregarMatAlumnos&idAM='.$item["id"].'" class="btn btn-secondary"> </i>+Alumnos</a> </td>
				
				<td><a href="index.php?action=editarMat&idEd='.$item["id"].'">
					<img src="imagenes/iconoE.png" alt="Enviar" width="20" height="20"></a>
					<a href="index.php?action=materias&idBorrar='.$item["id"].'">
					<img src="imagenes/delete.png" alt="Enviar" width="20" height="20"></a></a></td></tr>';
		}

	}
	//VISTA DE GRUPOS
	#------------------------------------

	public function vistaGruposController(){

		$respuesta = Datos::vistas("grupos");
		
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
        //foreach iterra sobre el array de datos de la tabla clientes de la BD
		foreach($respuesta as $row => $item){
			$datosController =$item["id_maestro"];
		    $res = Datos::editar($datosController, "maestros");
		echo'<tr>
		        <td>'.$item["codigo"].'</td>
				<td>'.$item["carrera"].'</td>
				
				
				<td> <a href="index.php?action=agregarMatGrupos&idAM='.$item["id"].'" class="btn btn-secondary"> </i>+Materias</a> </td>
				
				<td><a href="index.php?action=editarG&idEd='.$item["id"].'">
					<img src="imagenes/iconoE.png" alt="Enviar" width="20" height="20"></a>
					<a href="index.php?action=grupos&idBorrar='.$item["id"].'">
					<img src="imagenes/delete.png" alt="Enviar" width="20" height="20"></a></a></td></tr>';
		}

	}

	#REGISTRO DE ALUMNOS
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

				header("location:index.php?action=alumnos");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#REGISTRO DE MAESTROS
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

				header("location:index.php?action=maestros");

			}

			else{

				header("location:index.php");
			}

		}

	}
	#REGISTRO DE ALUMNOS
	#------------------------------------
	public function registroGruposController(){
		//comprueba se hayan ingresado los datos del usuario
		 if(isset($_POST["codigo"])){
		  //almacena los datos ingresados en un array y los envia models/crud.php para realizar la sentencia sql a la base de datos
			 $datosController = array( "codigo"=>$_POST["codigo"],
										"carrera"=>$_POST["carrera"], 
									  
									   );
 
			 $respuesta = Datos::registroGruposModel($datosController, "grupos");
			 //comprueba que los datos ingresados fueran almacenados de forma exitosa
			 if($respuesta == "success"){
 
				 header("location:index.php?action=grupos");
 
			 }
 
			 else{
 
				 header("location:index.phpaction=registrarG");
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

			 <input type="submit" class="btn btn-secondary" value="Actualizar">';

	}
	#EDITAR MAESTROS
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

			 <input type="submit" class="btn btn-secondary" value="Actualizar">';

	}
	
    #EDITAR MATERIAS
	#------------------------------------

	public function editarMateriasController(){
        //se consulta el registro segun el id obtenido con la funcion GET
		$datosController = $_GET["idEd"];
		$respuesta = Datos::editar($datosController, "materias");
		$res = Datos::vistas("maestros");
		$res2 = Datos::editar($respuesta["id_maestro"], "maestros");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditarM">
			 <input type="text" value="'.$respuesta["codigo"].'" name="codigoEditar" required>
			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
			
			 <select name="id_maestro"> <option value="'.$respuesta["id_maestro"].'" > '.$res2["nombre"].'</option>';
				foreach($res as $row => $item){
					echo'
						<option value="'.$item["id"].'">'.$item["nombre"].' '.$item["apellido"].'</option>';
							}
							echo '</select><input type="submit" class="btn btn-secondary" value="Actualizar">

			 ';

	}
	#EDITAR GRUPOS
	#------------------------------------

	public function editarGruposController(){
        //se consulta el registro segun el id obtenido con la funcion GET
		$datosController = $_GET["idEd"];
		$respuesta = Datos::editar($datosController, "grupos");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditarG">

			 <input type="text" value="'.$respuesta["codigo"].'" name="codigoEditarG" required>
			  <input type="text" value="'.$respuesta["carrera"].'" name="carreraEditarG" required>

			 <input type="submit" class="btn btn-secondary" value="Actualizar">';

	}
	#ACTUALIZAR GRUPOS
	#------------------------------------
	public function actualizarGruposController(){
		//comprueba se hayan ingresado los datos del cliente
		  if(isset($_POST["idEditarG"])){
  
			  $datosController = array( "id"=>$_POST["idEditarG"],
										"codigo"=>$_POST["codigoEditarG"],
										"carrera"=>$_POST["carreraEditarG"], 
										
									);
			  
			  $respuesta = Datos::actualizarGruposModel($datosController, "grupos");
			 //comprueba que los datos ingresados fueran almacenados de forma exitosa
			  if($respuesta == "success"){
  
				  header("location:index.php?action=grupos");
  
			  }
  
			  else{
  
				  echo "error";
  
			  }
  
		  }
	  
	  }
	#ACTUALIZAR ALUMNOS
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
    #ACTUALIZAR MAESTROS
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

	#ACTUALIZAR MATERIAS
	#------------------------------------
	public function actualizarMateriaController(){
		//comprueba se hayan ingresado los datos del cliente
		  if(isset($_POST["idEditarM"])){
  
			  $datosController = array( "id"=>$_POST["idEditarM"],
										"codigo"=>$_POST["codigoEditar"],
										"nombre"=>$_POST["nombreEditar"], 
										"id_maestro"=>$_POST["id_maestro"],
									);
			  
			  $respuesta = Datos::actualizarMateriasModel($datosController, "materias");
			 //comprueba que los datos ingresados fueran almacenados de forma exitosa
			  if($respuesta == "success"){
  
				  header("location:index.php?action=materias");
  
			  }
  
			  else{
  
				  echo "error";
  
			  }
  
		  }
	  
	  }

	#BORRAR ALUMNOS
	#------------------------------------
	public function borrarAlumnosController(){

		if(isset($_GET["idBorrar"])){
            //se borra el registro segun el id obtenido con la funcion GET
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrar($datosController, "alumnos");
			if($respuesta == "success"){
 
				header("location:index.php?action=maestros");
		
			}else{
  
				echo '<div class="alert alert-danger" role="alert">
				Este Alumno no puede ser Borrado
                </div>';

			}

		}
		
	
	}
	#BORRAR MAESTROS
	#------------------------------------
	public function borrarMaestrosController(){

		if(isset($_GET["idBorrar"])){
            //se borra el registro segun el id obtenido con la funcion GET
			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrar($datosController, "maestros");
			
			
			if($respuesta == "success"){

				header("location:index.php?action=maestros");
			
			}
			else{
  
				echo '<div class="alert alert-danger" role="alert">
				Este Maestro no puede ser Borrado
                </div>';

			}

		}

	
	}
	#BORRAR MATERIAS
	#------------------------------------
	public function borrarMateriasController(){

		if(isset($_GET["idBorrar"])){
            //se borra el registro segun el id obtenido con la funcion GET
			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrar($datosController, "materias");
			
			
			if($respuesta == "success"){

				header("location:index.php?action=materias");
			
			}
			else{
  
				echo '<div class="alert alert-danger" role="alert">
				Este Materia no puede ser Borrado
                </div>';

			}

		}

	
	}
	#BORRAR Grupos
	#------------------------------------
	public function borrarGruposController(){

		if(isset($_GET["idBorrar"])){
            //se borra el registro segun el id obtenido con la funcion GET
			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrar($datosController, "grupos");
			
			
			if($respuesta == "success"){

				header("location:index.php?action=grupos");
			
			}else{
  
				echo '<div class="alert alert-danger" role="alert">
				Este Grupo no puede ser Borrado
                </div>';

			}

		}

	
	}
	#formulario base para registrar materias
	#------------------------------------
	public function registroBaseMateriasController(){
		$res = Datos::vistas("maestros");
		$res2 = Datos::vistas("alumnos");
	
		   echo '
						<form method="post" >
							<input type="text" placeholder="Codigo" name="codigoMat" required>
							<input type="text" placeholder="Materia" name="nombreMat" required>
							<br/><label> Maestro:</label><br/>
							<select name="id_maestro"> <option value="0" > Escoger  un  maestro ... </option>';
							foreach($res as $row => $item){
								echo'
								<option value="'.$item["id"].'">'.$item["nombre"].' '.$item["apellido"].'</option>';
							}
							echo '</select><input type="submit"  class="btn btn-secondary" value="Enviar">
						</form>
					';
					}
			#Guardar reservaciones
	
	#REGISTRO DE MATERIAS
	#------------------------------------
	public function registroMateriaController(){
		$cod=$_POST["codigoMat"];
		if(isset($_POST["codigoMat"])){
			$datosController = array( "codigo"=>$_POST["codigoMat"],
							          "nombre"=>$_POST["nombreMat"], 
									  "id_maestro"=>$_POST["id_maestro"],
									  
									  );
			
			$respuesta = Datos::registroMateriasModel($datosController, "materias");
			foreach($respuesta2 as $row => $item){
				if($item["codigo"]==$cod){
					$id_mat=$item["id"];
				}
			}
			
			if($respuesta == "success"){
				
				header("location:index.php?action=materias");
				
			}
			else{
				echo "error";
			}

		}
	}
    #AGREGA ALUMNOS A LAS MATERIA
	#------------------------------------
	public function agregarAlumnoMatController(){
		 
		 $id_mat=$_GET["idAM"];
		 $res2 = Datos::vistas("alumnos");	
		 echo ' 
		 
	  	<form method="post" >
			<br/><label> Maestro:</label><br/>
			<select name="id_alumnos"> <option value="0" > Escoger  un  Alumno ... </option>';
			foreach($res2 as $row => $item){
				echo'<option value="'.$item["id"].'">'.$item["nombre"].' '.$item["apellido"].'</option>';
			}
				echo '</select><input type="submit" class="btn btn-primary" value="Agregar">
		</form>
		 ';
         $respuesta2 = Datos::aM("al-mat",$id_mat);
		 if(isset($_POST["id_alumnos"])){
			$datosController = array( "id_materia"=>$id_mat,
							          "id_alumnos"=>$_POST["id_alumnos"], 
									  );
		    $v=0;
			foreach($respuesta2 as $row => $item){
				//if si el alumno que se espera agregar ya esta inscrito 
		    if($item["id_alumno"]==$_POST["id_alumnos"]){
			$v=1;
			}
		    }
			
			if($v==0){
				$respuesta = Datos::registroMatAlumnos($datosController, "al-mat");
			}else{
				//alerta para alumnos que ya estan registrados
				echo '<div class="alert alert-danger" role="alert">
				Este alumno ya esta inscrito en la materia
                </div>';
			}
		}
		   $respuesta2 = Datos::aM("al-mat",$id_mat);
		   if($respuesta2!=NULL){
			   //tabla de vista de los alumnos inscritos en la materia
			 echo '<table class="table table-striped">
			 <tr>
			 <th>Id</th>
			 <th>Materia</th>
			 <th>Alumno</th>
			 <th>Eliminar<th></tr> ';
			foreach($respuesta2 as $row => $item){
				$d=$item["id_alumno"];
				$respuesta = Datos::editar($d, "alumnos");
				$M=$item["id_materia"];
				$respuesta3 = Datos::editar($M, "materias");
				echo'
				<tr>
						<td>'.$item["id"].'</td>
						<td>'.$respuesta3["nombre"].'</td>
						<td>'.$respuesta["nombre"].'</td>
						<td><a href="index.php?action=agregarMatAlumnos&idAM='.$id_mat.'&idAL='.$item["id_alumno"].'">
					<img src="imagenes/delete.png" alt="Enviar" width="20" height="20"></a></a></td>
					</tr>';
				}
			echo '</table>';
			
		 }	 
	
	}
	#BORRAR ALUMNOS A LAS MATERIA
	#------------------------------------
	public function borrarAlumnosMatController(){
		if(isset($_GET["idAL"])){
			//se borra el registro segun el id obtenido con la funcion GET
			$datosController = array("id_materia"=>$_GET["idAM"],
							      "id_alumno"=>$_GET["idAL"], 
									  );
			 $respuesta = Datos::borrarAlMat($datosController,"al-mat");
			 if($respuesta == "success"){
		   $t=$_GET["idAM"];
		   header("location:index.php?action=agregarMatAlumnos&idAM=$t");
		
		}

       }
	}
	
	  #AGREGA MATERIAS A GRUPOS
	#------------------------------------
	public function agregarMateriasGruposController(){
		 
			$id_mat=$_GET["idAM"];
			$res2 = Datos::vistas("materias");	
			echo ' 
			
			 <form method="post" >
			   <br/><label> Maestro:</label><br/>
			   <select name="id_materia"> <option value="0" > Escoger  una materia ... </option>';
			   foreach($res2 as $row => $item){
				   echo'<option value="'.$item["id"].'">'.$item["nombre"].'</option>';
			   }
				   echo '</select><input type="submit" class="btn btn-primary" value="Agregar">
		   </form>
			';
			$respuesta2 = Datos::mG("mat_grup",$id_mat);
			if(isset($_POST["id_materia"])){
			   $datosController = array( "id_grupo"=>$id_mat,
										 "id_materia"=>$_POST["id_materia"], 
										 );
			   $v=0;
			   foreach($respuesta2 as $row => $item){
			   //if si la materia que se espera agregar ya existe en el grupo
			   if($item["id_materia"]==$_POST["id_materia"]){
			   $v=1;
			   }
			   }
			   
			   if($v==0){
				   $respuesta = Datos::registroMatGrupos($datosController, "mat_grup");
			   }else{
				   //alerta para materias que ya estan registradas
				   echo '<div class="alert alert-danger" role="alert">
				  La materia ya pertenece al grupo
				   </div>';
			   }
		   }
			  $respuesta2 = Datos::mG("mat_grup",$id_mat);
			  //tabla de vista de las materias del grupo
			  if($respuesta2!=NULL){
				echo '<table class="table table-striped">
				<tr>
				<th>Id</th>
				<th>Grupo</th>
				<th>Materia</th>
				<th>Eliminar<th></tr> ';
			   foreach($respuesta2 as $row => $item){
				   $d=$item["id_materia"];
				   $respuesta = Datos::editar($d, "materias");
				   $M=$item["id_grupo"];
				   $respuesta3 = Datos::editar($M, "grupos");
				   echo'
				   <tr>
						   <td>'.$item["id"].'</td>
						   <td>'.$respuesta3["codigo"].'</td>
						   <td>'.$respuesta["nombre"].'</td>
						   <td><a href="index.php?action=agregarMatGrupos&idAM='.$id_mat.'&idMat='.$item["id_materia"].'">
					   <img src="imagenes/delete.png" alt="Enviar" width="20" height="20"></a></a></td>
					   </tr>';
				   }
			   echo '</table>';
			   
			}	 
	   
	   }
    #BORRAR MATERIAS DE GRUPO
	#------------------------------------
	public function borrarMateriasGrupController(){
		if(isset($_GET["idMat"])){
			//se borra el registro segun el id obtenido con la funcion GET
			$datosController = array("id_grupo"=>$_GET["idAM"],
							      "id_materia"=>$_GET["idMat"], 
									);
			 $respuesta = Datos::borrarMatGrup($datosController,"mat_grup");
			 if($respuesta == "success"){
		   $t=$_GET["idAM"];
		   header("location:index.php?action=agregarMatGrupos&idAM=$t");
		
		}

       }
	}




	
}