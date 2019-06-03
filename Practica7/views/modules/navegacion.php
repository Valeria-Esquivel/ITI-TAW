
		<?php
		$in=$_GET["action"];
		
		if($in!="inicio"){
		echo '<nav>
        <ul class="nav justify-content-center">';

		if($in=="alumnos" ||$in=="materias" ||
		$in=="grupos" ||$in=="maestros" ||$in=="registrarA"||$in=="registrarG"||$in=="registrarM"||$in=="registrarMat"
		||$in=="editarA"||$in=="editarM"||$in=="editarMat"||$in=="editarG"||$in=="agregarMatGrupos"||$in=="agregarMatAlumnos"){$r=2;}

		if($in=="ingresar"){$r=1;}
		error_reporting(0);
		if($r==2){
		echo '
		<li class="nav-item"><a class="nav-link" href="index.php?action=alumnos">Alumnos</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?action=maestros">Maestros</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?action=materias">Materias</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?action=grupos">Grupos</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?action=inicio">Salir</a></li>
		';}
		else 
		{
			$vistaNav = new MvcController();
			$vistaNav -> vistaNavegacionController();

		}
		echo '</ul>
		</nav>';
		
	}else
	echo '
	<nav>
	<ul class="nav justify-content-center">
	<li class="nav-item"><a class="nav-link" href="index.php?action=inicio">Salir</a></li>
	</ul>
	</nav>';?>
		

