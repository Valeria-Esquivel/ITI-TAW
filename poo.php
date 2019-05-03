<?php
#CLASE:
//Una clase es un modelo que se utiliza  para crear objetos que comparten un mismo comportamiento, estado oidentidad

class Automovil{
    //PROPIEDADES: son las caracteristicas que puede tener un objeto
    public $marca;
    public $modelo;
    //METODO: Es el algoritmo asociado a un objeto que indica la capacidad de lo que este puede hacer. La unica diferencia entre el método y funcón es que llamamos al metodo a FUNCIONES de una clase (en poo), mientras que llamamos funciones a los algoritmos de la programacion estructurada. 

    public function mostrar(){
        echo "<p> Hola, soy un $this->marca, modelo $this->modelo </p> ";

    }
}
//OBJETOS: es una entidad provista de métodos o mensajes  los cuales responde propiedades con valores concretos.

$a = new Automovil();
$a-> marca = "Chevrolet";
$a-> modelo ="Chevy";
$a->mostrar();


$b = new Automovil();
$b-> marca = "Chevrolet";
$b-> modelo ="Chevy";
$b->mostrar();

$c = new Automovil();
$c-> marca = "Honda";
$c-> modelo ="CRV";
$c->mostrar();

//Principios de la POO que se cumple en este ejemplo:

//1.ABSTRACCION: Nuevos tipos de datos (el que quiereas lo creas)
//2.Encapsulacón: Organiza el código en grupos logicos
//3. Ocultamiento: Oculta detalles 


?>