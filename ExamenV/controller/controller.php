<?php

class Mvc{

    public function vistasA(){
		
        $respuesta = Datos::vistas("alumnos");
        
        
        foreach($respuesta as $row => $item){
            $respuesta2 = Datos::vistasid("grupo",$item["id_grupo"]);
            $respuesta3 = Datos::vistasid("año",$item["año_ingreso"]);
            
            echo'<tr>
            <td>'.$item["matricula"].'</td>
            <td>'.$item["nombre"].'</td>
            <td>'.$item["apellidos"].'</td>
            <td>'.$item["carrera"].'</td>
            <td>'.$item["id_grupo"].'</td>
            <td>'.$item["año_ingreso"].'</td>
            
            ';
    }
}
public function vistasG(){
		
    $respuesta = Datos::vistas("grupos");
    
    
    foreach($respuesta as $row => $item){
       
        
        echo'<tr>
        <td>'.$item["id"].'</td>
        <td>'.$item["nombre"].'</td>
        <td>'.$item["cuatrimestre"].'</td>
    
        
        ';
}}
public function EPaginas(){

    if(isset( $_GET['action'])){
        
        $enlaces = $_GET['action'];
    
    }

    else{

        $enlaces = "index";
    }
    error_reporting(0);
    $respuesta = Paginas::enlacesPaginasModel($enlaces);

    include $respuesta;

}

public function pagina(){	
    
    include "views/template.php";

}
}


?>