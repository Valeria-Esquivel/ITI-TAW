
<?php

//definir la clase persona
class Persona{
    //propiedades
    public $edad;
    public $altura;
    public $peso;


    //definir metodo obtencion de datos
    //getters
    public function getEdad(){
        return $this->edad;
    }
    public function getPeso(){
        return $this->peso;
    }
    public function getAltura(){
        return $this->altura;
    }

    //definir Metodos asignacion de datos
    //setters
    public function setEdad($valor){
        $this->edad=$valor;
    }
    public function setAltura($valor){
        $this->altura=$valor;
    }
    public function setPeso($valor){
        $this->peso=$valor;
    }

    //metodo de clalculo del inice de masa corporal accediendo a las propiedades
    public function imc(){
        return $this->peso/($this->altura*$this->altura);
    }

    //calcula IMC accediendo mediante los metodos get
    public function imc2(){
        return $this->getPeso() /  ($this->getAltura()*$this->getAltura());
    }

}

?>