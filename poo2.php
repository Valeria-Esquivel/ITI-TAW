<?php

//definir CLASE para mostrar PROPIEDADES de Libros

class libro{
    public $titulo= "Titulo del libro";
    public $autor="Autor del libro";
    public $annoPublicacion="2019";
    public $numeroHojas = "Hojas por defecto";
    public $editorial="editorial upv";
}
?>
<<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagina de datos de libros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<?
$libro1= new libro();
?>



<body>
<h1 align="center"><?php echo $libro1->titulo;?></h1>
<h1 align="center"><?php echo $libro1->autor;?></h1>
<h1 align="center"><?php echo $libro1->annoPublicacion;?></h1>
<h1 align="center"><?php echo $libro1->numeroHojas;?></h1>
<h1 align="center"><?php echo $libro1->editorial;?></h1>
</body>
</html>
