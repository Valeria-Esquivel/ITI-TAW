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
	
		
		<li><a href="index.php?action=registro">Habitaciones</a></li>
		<li><a href="index.php?action=productos">Reservas</a></li>
		<li><a href="index.php?action=salir">Salir</a></li>


	<?php
	}else if($us==1){
	?>
	<nav>
	<ul>
	
		<li><a href="index.php?action=registro&idus=1">Usuarios</a></li>
		<li><a href="index.php?action=productos">Consultas</a></li>
		<li><a href="index.php?action=productos">Habitaciones</a></li>
		<li><a href="index.php?action=productos">Reservas</a></li>
		<li><a href="index.php?action=salir">Salir</a></li>

<?php
}
?>
</ul>
</nav>