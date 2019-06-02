<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){

		$module =  "views/modules/".$enlaces.".php";
		 if($enlaces == "ok_alumno"){
			$module =  "views/modules/alumnos.php";
		}
		else if($enlaces == "materia_alumno"){
			$module =  "views/modules/agregarMatAlumnos.php";
		}
		else if($enlaces == "materia_grupo"){
			$module =  "views/modules/agregarMatGrupos.php";
		}
		else if($enlaces == "index"){
			$module =  "views/modules/alumnos.php";
		}
		
		
		/*if($enlaces == "reservas" ||$enlaces == "habitaciones" ||$enlaces == "regHabitacion" 
			||$enlaces == "regCliente" ||$enlaces == "editarH" ||$enlaces == "ingresar" 
			||$enlaces == "registro"||$enlaces == "verReserva" || $enlaces == "usuarios" || $enlaces == "editarC" || $enlaces == "editarR" 
			||$enlaces == "verHabitacion" ||$enlaces == "clientes" || $enlaces == "ganancia" ||$enlaces == "salir"
			|| $enlaces == "regReserva"){

				$module =  "views/modules/".$enlaces.".php";
			
			}
			
	*/
		
		return $module;
	}

	

}

?>