
		<?php
		$in=$_GET["action"];
		if($in!="inicio"){
		echo '
		<nav>
        <ul class="nav justify-content-center">
		<li class="nav-item"><a class="nav-link" href="index.php?action=alumnos">Alumnos</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?action=maestros">Maestros</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?action=materias">Materias</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?action=grupos">Grupos</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?action=inicio">Salir</a></li>
		</ul>
        </nav>';
	}else
	echo '
	<nav>
	<ul class="nav justify-content-center">
	<li class="nav-item"><a class="nav-link" href="index.php?action=inicio">Salir</a></li>
	</ul>
	</nav>';?>
		

