<?php

session_start();



?>

<h1>EDITAR ALUMNO</h1>

<form method="post">
	
	<?php
	//utiliza la el metodo de la clase MvcController de controller/controller.php
		$editarC = new MvcController();
		$editarC -> editarAlumnosController();
		$editarC -> actualizarAlumnosController();




	?>

</form>



