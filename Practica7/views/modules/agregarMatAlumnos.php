<h2>Agregar Alumnos</h2>
<?php
session_start();

	$registro = new MvcController();
	$registro -> agregarAlumnoMatController();
	$registro ->  borrarAlumnosMatController();
         
        
?>


<?php


if(isset($_GET["action"])){
	if($_GET["action"] == "materia_alumno"){
		echo "Registro Exitoso";
	}
}

?>