<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>


<body class="wide comments example dt-example-bootstrap4">
<div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Habitaciones</b></h2></div>
                      <div class="col-sm-4">
					  <?php if($_GET["idus"]==1){ ?>
				<a href="index.php?action=regHabitacion&idus=1" class="btn btn-info add-new">
				<?php } else if($_GET["idus"]==2){ ?>
					<a href="index.php?action=regHabitacion&idus=2" class="btn btn-info add-new" >
				<?php }   ?>
                           </i>Nuevo Registro</a> 
                      </div>
                </div>

                </div>
            </div>
			<div class="row">

<br/>
<br/>
<br/>

	<table id="example" class="table table-striped table-bordered" style="width:100%">
		
		
		<thead>
			
			<tr>
                <th>Numero de Habitacion</th>
				<th>Habitacion</th>
				<th>precio</th>
                <td><a href="index.php?action=regHabitacion&idus=1"></a>
                
                </td>
				
                
			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaHabitacionesController();
			$vistaUsuario -> borrarHabitacionesController();

			?>

		</tbody>

	</table>
	</div> 

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>
