<?php

session_start();



?>
<body class="wide comments example dt-example-bootstrap4">
<div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Maestros</b></h2></div>
                      <div class="col-sm-4">
					 
					 
				       <a href="index.php?action=registrarM" class="btn btn-info add-new">
				
				        
                           </i>Nuevo Registro</a> 
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
				<th>Numero Empleado</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Carrera</th>
				<th>Email</th>
				<th></th>
				

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaAlumnos = new MvcController();
			$vistaAlumnos -> vistaMaestrosController();
			$vistaAlumnos -> borrarMaestrosController();

			?>

		</tbody>

	
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



