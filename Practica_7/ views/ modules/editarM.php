<?php

session_start();



?>

<h1>EDITAR MAESTRO</h1>

<form method="post">
	
	<?php
	//utiliza la el metodo de la clase MvcController de controller/controller.php
		$editarC = new MvcController();
		
		$editarC -> editarMaestrosController();
		$editarC -> actualizarMaestrosController();




	?>

</form>
 
