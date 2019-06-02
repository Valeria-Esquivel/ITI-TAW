<h2>Agregar Materias</h2>
<?php
session_start();

	$registro = new MvcController();
	$registro -> agregarMateriasGruposController();
	$registro ->  borrarMateriasGrupController();
         
        
?>


<?php


if(isset($_GET["action"])){
	if($_GET["action"] == "materia_grupo"){
		echo "Registro Exitoso";
	}
}

?>