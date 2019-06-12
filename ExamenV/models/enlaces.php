<?php 

class Paginas{
    
	
	public function enlacesPaginasModel($enlaces){
       
       

        $module =  "views/modules/".$enlaces.".php";
        return $module;
    }
}
?>