<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>


<section>


</section>

    
</body>
</html>
<table >
		
		<thead>
			
			<tr>
			    <th>Matricula</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Carrera</th>
				<th>año_ingreso</th>
				<th>id_grupo</th>
				
			</tr>
		</thead>

		<tbody>
			
			<?php

			$vistaAlumnos = new Mvc();
			$vistaAlumnos -> vistasA();
			

			?>

		</tbody>

	</table>