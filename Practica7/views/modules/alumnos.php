<?php

session_start();

?>
<body class="wide comments example dt-example-bootstrap4">
<div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Alumnos</b></h2></div>
                      <div class="col-sm-4">
					 
					 
				       <a href="index.php?action=registrarA" class="btn btn-info add-new">
				
				        
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
			    <th>Matricula</th>
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
			$vistaAlumnos -> vistaAlumnosController();
			$vistaAlumnos -> borrarAlumnosController();

			?>

		</tbody>

	</table>
	</div> 

<?php

?>
