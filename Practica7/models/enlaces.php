<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){

		$module =  "views/modules/".$enlaces.".php";
		
		
		
		/*if($enlaces == "reservas" ||$enlaces == "habitaciones" ||$enlaces == "regHabitacion" 
			||$enlaces == "regCliente" ||$enlaces == "editarH" ||$enlaces == "ingresar" 
			||$enlaces == "registro"||$enlaces == "verReserva" || $enlaces == "usuarios" || $enlaces == "editarC" || $enlaces == "editarR" 
			||$enlaces == "verHabitacion" ||$enlaces == "clientes" || $enlaces == "ganancia" ||$enlaces == "salir"
			|| $enlaces == "regReserva"){

				$module =  "views/modules/".$enlaces.".php";
			
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

		//da acceso a ciertas paginas del sitio al usuario normal
		
		
*/
		
		return $module;
	}

	

}

?>