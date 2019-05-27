<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){
		$us=$_GET["idus"];
		//$enlaces es recibido como parametro y este indica la pagina para acceder

		if($enlaces == "ingresar"){
	
			$module =  "views/modules/ingresar.php";
		
		}
         //da acceso a todas las paginas del sitio al usuario Administrador get[idus] trae el tipo de usuario que ingreso
		if($us==1){
			if($enlaces == "reservas" ||$enlaces == "habitaciones" ||$enlaces == "regHabitacion" 
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
		
		}else if($us==2){
			if($enlaces == "reservas" ||$enlaces == "habitaciones" ||$enlaces == "regHabitacion"||$enlaces == "regCliente" ||$enlaces == "clientes"
			 ||$enlaces == "ingresar" ||$enlaces == "registro"  ||$enlaces == "verHabitacion" 
			 ||  $enlaces == "habitaciones" || $enlaces == "regReserva"||$enlaces == "verReserva"){

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
	
				$module =  "views/modules/ingresar.php"; //si la pagina no es encontrada se abre ingresar.php
	
			}
			



		}

		
		return $module;

	}

}

?>