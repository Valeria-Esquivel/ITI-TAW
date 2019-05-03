<?
//codigo imperativo espaguetti

$automovil1=(objeto)("marca"=>"chevrolet","modelo"=>"Chevy");
$automovil2=(objeto)("marca"=>"Ford","modelo"=>"Lobo");
$automovil3=(objeto)("marca"=>"Honda","modelo"=>"CRV");

//Funcion con parametros para imprimir determinado automovil
function mostrar($automovil){
    echo"<p> Hola soy un $automovil -> marca , modelo $automovil->modelo</p>";
}

mostrar($automovil);
mostrar($automovi2);
mostrar($automovi3);
?>