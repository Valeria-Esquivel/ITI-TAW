<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

	#VISTAS trae todos los datos de la tabla de la base de datos, recibiendo como parametros el nombre de la tabla
	#-------------------------------------

	public function vistas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
	#VISTAS trae todos los datos de la tabla de la base de datos, recibiendo como parametros el nombre de la tabla
	#-------------------------------------

	public function aM($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `$tabla` where id_materia=:id");	
		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#-------------------------------------

	public function mG($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `$tabla` where id_grupo=:id");	
		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroAlumnosModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula,nombre,apellido,carrera,email) VALUES (:matricula,:nombre,:apellido, :carrera,:email)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#REGISTRO DE MAESTROS
	#-------------------------------------
	public function registroMaestrosModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`no.empleado`,nombre,apellido,carrera,email) VALUES (:empleado,:nombre,:apellido, :carrera,:email)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":empleado", $datosModel["empleado"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
		#REGISTRO DE MAESTROS
	#-------------------------------------
	public function registroMateriasModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo,nombre,id_maestro) VALUES (:codigo,:nombre,:id_maestro)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id_maestro", $datosModel["id_maestro"], PDO::PARAM_STR);
	
		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


		#REGISTRO DE ALUMNOS A LAS MATERIAS
	#-------------------------------------
	public function registroMatAlumnos($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO `$tabla` (`id_materia`, `id_alumno`)  VALUES (:id_materia,:id_alumnos)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_STR);
		$stmt->bindParam(":id_alumnos", $datosModel["id_alumnos"], PDO::PARAM_STR);
	
		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#REGISTRO DE MATERIAS A LOS GRUPOS
    #-------------------------------------
    public function registroMatGrupos($datosModel, $tabla){

	#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

	$stmt = Conexion::conectar()->prepare("INSERT INTO `$tabla` (`id_grupo`, `id_materia`)  VALUES (:id_grupo,:id_materia)");	

	#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
	$stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_STR);
	$stmt->bindParam(":id_grupo", $datosModel["id_grupo"], PDO::PARAM_STR);

	if($stmt->execute()){

		return "success";

	}

	else{

		return "error";

	}

	$stmt->close();

}
    #REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroGruposModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo,carrera) VALUES (:codigo, :carrera)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		
		

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#EDITAR REGISTRO: selecciona el registro que coincida con el id proporcionado
	#-------------------------------------
    
	public function editar($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
    #BORRAR REGISTRO: bora el registro que coincida con el id ($datosModel)
	#------------------------------------
	public function borrar($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}
	public function borrarAlMat($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM `$tabla` WHERE id_materia = :id_materia and id_alumno= :id_alumno");
		
		$stmt->bindParam(":id_alumno", $datosModel["id_alumno"], PDO::PARAM_STR);
		$stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	public function borrarMatGrup($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM `$tabla` WHERE id_materia = :id_materia and id_grupo= :id_grupo");
		
		$stmt->bindParam(":id_grupo", $datosModel["id_grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	public function actualizarAlumnosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET matricula=:matricula, nombre = :nombre, apellido = :apellido, carrera=:carrera, email=:email WHERE id = :id");

		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
    public function actualizarMaestrosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `no.empleado`=:matricula, nombre = :nombre, apellido = :apellido, carrera=:carrera, email=:email WHERE id = :id");

		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	public function actualizarMateriasModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `codigo`=:codigo, nombre = :nombre, id_maestro = :id_maestro WHERE id = :id");

		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id_maestro", $datosModel["id_maestro"], PDO::PARAM_STR);
	
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	public function actualizarGruposModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `codigo`=:codigo, carrera = :carrera WHERE id = :id");

		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

}
?>
