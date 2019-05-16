<?php
class MvcController{
    //metodo para llamar a la plantilla 
    public function plantilla(){
        //include () se utiliza para invocar el archivo que contiene el codigo html
        include "views/template.php";
    }

    //Interaccion y navegacion del usuario
    public function enlacesPaginasController(){
        if(isset($_GET["action"])){
            $enlacesController=$_GET["action"];
        }else{
            $enlacesController="index";
        }
        //mandar parametro a modelo
        error_reporting(0);
        $respuesta= EnlacesPaginas::enlacesPaginasModel($enlacesController);
        include $respuesta;
    }
}


?>