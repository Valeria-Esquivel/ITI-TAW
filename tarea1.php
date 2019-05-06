<?php
//HERENCIA DE CLASES- METODOS ABSTACTOS

//Declaracion de clase abstaracta-Clase padre
//las clases abstaractas solo sirven de modelo para otras clases, sin que puedan ser instanciadas 
abstract class servicio
{
    //función abstracta
    abstract public function saludar($nombre);
    public function carta($nombre,$almuerzo)
    {
        echo $this->saludar($nombre);
        echo "Le puedo ofrecer: <br/>";

        foreach($almuerzo as $clave=>$valor){
            echo $clave.":".$valor."<br/>";
        }
    }

}

//clase que hereda los metodos de la clase abstarcta y la funcion saludar
//clase hija

class mesero extends servicio
{
    //metodo saludar de la clase abstracta
    public function saludar($nombre)
    {
        return "Buenas tardes señor(a): ".$nombre."<br/>";
        
    }
}

$mesero1 = new mesero();
$nombrePersona = "Valeria Esquivel";
$almuerzo = array("Sopa " => "Fideos", "Seco " => "Carne Res, Papitas, Ensalada", "Jugo " => "Mora");

$mesero1->carta($nombrePersona,$almuerzo);

//clases finales: no pueden ser heredadas por otras
final class Automovil
{
    /*class Camion extends Automovil
    {

    }*/
}


//OBJETOS E INSTANCIAS
class Persona
{
    //propiedades o instancias de la clase con nivel de acceso publico, privado, protegido y estaticas
    //Propiedades publicas pueden ser accedidas desde cualquier parte de la aplicacion
    public $nombre="Yhoan";
    public $edad;
    //propiedades privadas: solo pueden ser accedidas por la clase que las definió
    private $genero;
    //propiedades protegidas: pueden ser accedidas por la propia clase que la definio y por las clases que la heredan
    protected $pasaporte;
    //propiedades estaticas: no puede ser modificada para cada objeto, es como una variable global para todas las instancias que se crean de ese objeto
    public static $tipoSangre = 'A+';

    public function hola()
    {
        //se utiliza $this para acceder a una propiedad no estatica dentro de la clase
        echo $this->nombre."<br>";
        //se utiliza self:: o parent:: para acceder a una propiedad estatica dentro de la clase
        echo self::$tipoSangre."<br>";
    }

    //Metodos: los metodos al igual que las propiedades pueden ser públicos, privados, protegidos y estáticos
    public function donar_sangre($tipoSangre){}
    static function a(){}
    protected function b(){}
    private function c(){}

}

//para instanciar una clase solo es necesario utilizar la palabra new
$persona = new Persona();
//De esta manera se puede acceder a un atributo estatico
echo Persona::$tipoSangre."<br>";
//modificamos 
Persona::$tipoSangre = "O+";
echo Persona::$tipoSangre."<br>";


//para acceder a las instancias o propiedades publicas se crea un objeto
$p = new Persona();
$p->nombre = "Alexandra";
echo $p->nombre."<br>";

$p2= new Persona();
$p2->nombre = "Valeria";
echo $p2->nombre."<br>";


//CONSTANTES
//Las constantes mantienen su valor de forma permanente, no pueden ser declaradas dentro de una clase

define('MENSAJE','<h1>Bienvenidos al curso</h1>');
echo MENSAJE;

const MI_CONSTANTE = 'este es el valor estatico de mi constante';
echo MI_CONSTANTE;

class Producto{
    //propiedades de la clase
    public $nombre;
    public $precio
    protected $estado;

    //metodo set_estado_producto
    protected function setEstado($estado){
        $this->estado=$estado;

    }

    public function ver()
    {
        echo "Hola soy el producto: ".$this->nombre."<br/>";
        echo "Tengo un precio de: ".$this->precio."<br/b>";
        echo "Me encuentro con un estado de: ".$this->estado."<br/>";
    }

    //constructor de la clase
    function __construct(){
        $this->setEstado('en uso');
    }

    //destructor de la clase
    function __destruct(){
        $this->setEstado('liberado')
        echo "El objeto ha sido destruido <br/>";
        echo "El objeto ha sido: ".$this->estado."<br/>";
    }
}
$_producto= new Producto();
$_producto->nombre="Leche Colanta";
$_producto->precio=2000;
$_producto->ver();
?>