<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{
    #INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre = :nombre");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

    }
    #REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo_usuario,nombre,password) VALUES (:tipo_usuario,:nombre,:password)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":tipo_usuario", $datosModel["tipo_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		

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