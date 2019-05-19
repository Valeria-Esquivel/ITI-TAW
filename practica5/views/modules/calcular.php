<h1>Consultar</h1>

	<form method="post">
		
        <input type="date"  name="fechas" min="2018-03-25" max="2058-05-25" step="2"required>

		

		<input type="submit" value="Enviar">

	</form>
	


<?php

$calcular = new MvcController();
$calcular ->gananciasPromedioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>