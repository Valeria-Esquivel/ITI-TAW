<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "calcular" ||$enlaces == "venta" ||$enlaces == "ventas" ||$enlaces == "regProducto" ||$enlaces == "productos" ||$enlaces == "ingresar" ||$enlaces == "registro" || $enlaces == "usuarios" || $enlaces == "editar" ||$enlaces == "editarP" ||$enlaces == "detalle_venta" || $enlaces == "salir"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/usuarios.php";
		
		}

		else{

			$module =  "views/modules/ingresar.php";

		}
		
		return $module;

	}

}

?>