<nav>
<ul>

	<?php
	$us=0;
	//utiliza GET para utilizar idus obtenido de la url
	//idus guarda el tipo de usuario que ingresa en donde 1 es Administrador y 2 es un usuario normal	
	$us=$_GET["idus"];
	if($us==0){
		?>
		<li><a href="index.php?action=ingresar">Ingreso</a></li>
		<?php
	}

    //restringe la entrada al usuario normal de todas las secciones o paginas del sitio
	if($us==2){
	?>
	
	    <li><a href="index.php?action=clientes&idus=2">Clientes</a></li>
		<li><a href="index.php?action=habitaciones&idus=2">Habitaciones</a></li>
		<li><a href="index.php?action=reservas&idus=2">Reservas</a></li>
		<li><a href="index.php?action=salir&idus=2">Salir</a></li>


	<?php
	}else if($us==1){//comprueba que el usuario ingresado sea un administrador con  privilegios a las paginas
	?>

	
		<li><a href="index.php?action=registro&idus=1">Usuarios</a></li>
		<li><a href="index.php?action=clientes&idus=1">Clientes</a></li>
		<li><a href="index.php?action=habitaciones&idus=1">Habitaciones</a></li>
		<li><a href="index.php?action=reservas&idus=1">Reservas</a></li>
		<li><a href="index.php?action=ganancia&idus=1">Ganancias</a></li>
		<li><a href="index.php?action=salir">Salir</a></li>

<?php
}
?>
</ul>
</nav>