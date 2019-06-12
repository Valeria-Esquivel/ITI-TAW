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

<nav>
	<ul class="nav justify-content-center">
	<li class="nav-item"><a class="nav-link" href="index.php?action=alumnos">Alumnos</a></li>
    <li class="nav-item"><a class="nav-link" href="index.php?action=grupos">grupos</a></li>
	</ul>
	</nav>
<section>

<?php 

$mvc = new Mvc();
$mvc -> EPaginas();

 ?>
</section>

    
</body>
</html>