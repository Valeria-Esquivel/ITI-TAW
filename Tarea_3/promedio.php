<?php

//Definir la clase promedio
class Promedio{
    public $U1;
    public $U2;
    public $U3;
    public $nombres;
    //public $promedios=array();
    
    
    //Definir metodo get para obtener los datos
    public function getNombres(){
        return $this->nombres;

    }
   
    public function getUnidad1(){
        return $this->U1;

    }
    public function getUnidad2(){
        return $this->U2;

    }
    public function getUnidad3(){
        return $this->U3;

    }
    //definir Metodos asignacion de datos
    public function setNombres($valor){
        $this->nombres=$valor;

    }
    public function setUnidad1($valor){
        if($valor<=60){$valor=60;}
        $this->U1=$valor;
    }
    public function setUnidad2($valor){
        if($valor<=60){$valor=60;}
        $this->U2=$valor;
    }
    public function setUnidad3($valor){
        if($valor<=60){$valor=60;}
        $this->U3=$valor;
    }
     //calcula el promedio accediendo a las propiedades
    public function promedio(){
        if($this->U1<=60||$this->U2<=60||$this->U3<=60){//si alguna de las unidades es <=60 el promedio es 60
            return 60;
        }
        
        return ($this->U1+$this->U2+$this->U3)/3;
    }
    //calcula el promedio accediendo mediante los metodos get
    public function promedio2(){
       
        return ($this->getUnidad1()+$this->getUnidad2()+$this->getUnidad3())/3;
    }
    //ordena los valores dentro del array de mayor a menor
    public function ordenar($valor){
        arsort($valor);
        echo "TABLA DE PROMEDIOS: ";
        foreach($valor as $key =>$val){
            echo "<br> $key = $val";
        }

    }

     
}


?>