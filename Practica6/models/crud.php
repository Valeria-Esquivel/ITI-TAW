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
	
	#VISTAS
	#-------------------------------------

	public function vistas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#BORRAR REGISTRO
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
		#REGISTRO DE CLIENTES
	#-------------------------------------
	public function registroClientesModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, tipo) VALUES (:nombre,:apellido, :tipo)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#EDITAR REGISTRO
	#-------------------------------------

	public function editar($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR CLIENTES
	#-------------------------------------

	public function actualizarClientesModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, tipo = :tipo WHERE id = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
		#REGISTRO DE HABITACIONES
	#-------------------------------------
	public function registroHabitacionesModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`id`, `tipo_habitacion`, `precio`, `img_hotel` ) VALUES (NULL,:tipo_habitacion,:precio,:imagen)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":tipo_habitacion", $datosModel["tipo_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datosModel["imagen"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#ACTUALIZAR HABITACION
	#-------------------------------------

	public function actualizarHabitacionesModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo_habitacion = :tipo_habitacion, precio = :precio WHERE id = :id");

		$stmt->bindParam(":tipo_habitacion", $datosModel["tipo_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#REGISTRO DE resevciones
	#-------------------------------------
	public function registroReservasModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`id_cliente`, `id_habitacion`, `fecha_entrada`, `dias_reserva`, `pago_total`, `estado` ) VALUES (:id_cliente,:id_habitacion,:fecha_entrada,:dias_reserva,:pago_total,:estado)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":id_cliente", $datosModel["id_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":id_habitacion", $datosModel["id_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_entrada", $datosModel["fecha_entrada"], PDO::PARAM_STR);
		$stmt->bindParam(":dias_reserva", $datosModel["dias_reserva"], PDO::PARAM_STR);
		$stmt->bindParam(":pago_total", $datosModel["pago_total"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR RESERVACION
	#-------------------------------------

	public function actualizarReservacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_cliente = :id_cliente, id_habitacion = :id_habitacion, fecha_entrada = :fecha_entrada, dias_reserva = :dias_reserva, pago_total = :pago_total, estado = :estado WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cliente", $datosModel["id_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":id_habitacion", $datosModel["id_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_entrada", $datosModel["fecha_entrada"], PDO::PARAM_INT);
		$stmt->bindParam(":dias_reserva", $datosModel["dias_reserva"], PDO::PARAM_INT);
		$stmt->bindParam(":pago_total", $datosModel["pago_total"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	public function consultarG($d1,$d2, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  `fecha_entrada` BETWEEN '$d1' AND '$d2'");
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
    
}
?>