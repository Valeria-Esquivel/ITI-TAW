<?php

session_start();



?>

<h1>EDITAR MATERIAS</h1>

<form method="post">
	
	<?php
	
		$editarC = new MvcController();//utiliza la el metodo de la clase MvcController de controller/controller.php
		$editarC -> editarMateriasController();
		$editarC -> actualizarMateriaController();




	?>

</form>
