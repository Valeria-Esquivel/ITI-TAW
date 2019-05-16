<?php
//el index: En el mostraremos la salida de las vistas al usario y tambien a traves de el enviaremos las distintas acciones del usuario envie al controlador 

require_once "controllers/controller.php";
require_once "models/model.php";

$mvc= new MvcController();
$mvc->plantilla();


?>