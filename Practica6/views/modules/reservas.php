<?php

session_start();
//valida el acceso del usuario
if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>



<body class="wide comments example dt-example-bootstrap4">
<div class= "container">
       <div class = "table-wrapper">
            <div class ="row">
                      <div class="col-sm-8"><h2>Reservaciones</b></h2></div>
                      <div class="col-sm-4">
					  <?php if($_GET["idus"]==1){ ?>
				<a href="index.php?action=regReserva&idus=1" class="btn btn-info add-new">
				<?php } else if($_GET["idus"]==2){ ?>
					<a href="index.php?action=regReserva&idus=2" class="btn btn-info add-new" >
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
                <th>Numero de reserva </th>
                <th>Numero de cliente</th>
				<th>numero de habitacion</th>
				<th>fecha de entrada</th>
                <th>Dias de reserva</th>
                <th>Pago Total</th>
                <td><center><a href="index.php?action=regReserva&idus=1">
				<img src="imagenes/iconoG1.png" alt="Enviar" width="30" height="30"></center></a>
                
                </td>
   


			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaReserva = new MvcController();
			$vistaReserva -> vistaReservasController();//utiliza la el metodo de la clase MvcController de controller/controller.php
			$vistaReserva ->  borrarReservasController();//utiliza la el metodo de la clase MvcController de controller/controller.php

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