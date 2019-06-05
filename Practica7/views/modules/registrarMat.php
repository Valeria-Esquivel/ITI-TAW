<h1>REGISTRO DE MATERIA</h1>
<?php
session_start();

?>



	<?php
		$registro = new MvcController();
        $registro -> registroBaseMateriasController();
        $registro -> registroMateriaController();
     //   $registro -> agregarAlumnoMatController();
         
        
	?>


<?php

if(isset($_GET["action"])){
	if($_GET["action"] == "ok_tutoria"){
		echo "Registro Exitoso";
	}
}

?>