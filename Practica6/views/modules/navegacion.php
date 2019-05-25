<nav>
<ul>

	<?php
	$us=0;
	
	$us=$_GET["idus"];
	if($us==0){
		?>
		<li><a href="index.php?action=ingresar">Ingreso</a></li>
		<?php
	}


	if($us==2){
	?>
	
	    <li><a href="index.php?action=clientes&idus=2">Clientes</a></li>
		<li><a href="index.php?action=registro&idus=2">Habitaciones</a></li>
		<li><a href="index.php?action=productos&idus=2">Reservas</a></li>
		<li><a href="index.php?action=salir&idus=2">Salir</a></li>


	<?php
	}else if($us==1){
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