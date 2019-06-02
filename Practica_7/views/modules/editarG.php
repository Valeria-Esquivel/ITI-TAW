<?php
session_start();
?>
<h1>EDITAR GRUPOS</h1>
<form method="post">
	<?php
		$editarC = new MvcController();//utiliza la el metodo de la clase MvcController de controller/controller.php
		$editarC -> editarGruposController();
		$editarC -> actualizarGruposController();
	?>

</form>

