<?php
session_start();
?>
<h1>EDITAR ALUMNO</h1>
<form method="post">
	<?php
		$editarC = new MvcController();
		$editarC -> editarAlumnosController();
		$editarC -> actualizarAlumnosController();
	?>
</form>



