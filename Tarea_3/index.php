<?php
//incluye la clase del archivo promedio.php
include "promedio.php";

//instancias de la clase
$promedioAlumno1 = new Promedio();
$promedioAlumno2 = new Promedio();
$promedioAlumno3 = new Promedio();
$promedioAlumno4 = new Promedio();
$promedioAlumno5 = new Promedio();
$promedioAlumno6 = new Promedio();
$promedioAlumno7 = new Promedio();
$promedioAlumno8 = new Promedio();
$promedioAlumno9 = new Promedio();
$promedioAlumno10 = new Promedio();
$promediosAl = new Promedio();



//asignar valores a las propiedades de los objetos
$promedioAlumno1->setNombres('Valeria'); $promedioAlumno1->setUnidad1(100); $promedioAlumno1->setUnidad2(100); $promedioAlumno1->setUnidad3(100);
$promedioAlumno2->setNombres('Alexandra'); $promedioAlumno2->setUnidad1(100); $promedioAlumno2->setUnidad2(80); $promedioAlumno2->setUnidad3(50);
$promedioAlumno3->setNombres('Julia'); $promedioAlumno3->setUnidad1(90); $promedioAlumno3->setUnidad2(70); $promedioAlumno3->setUnidad3(80);
$promedioAlumno4->setNombres('Soledad'); $promedioAlumno4->setUnidad1(80); $promedioAlumno4->setUnidad2(80); $promedioAlumno4->setUnidad3(99);
$promedioAlumno5->setNombres('Daniel'); $promedioAlumno5->setUnidad1(70); $promedioAlumno5->setUnidad2(99); $promedioAlumno5->setUnidad3(99);
$promedioAlumno6->setNombres('Eduardo'); $promedioAlumno6->setUnidad1(70); $promedioAlumno6->setUnidad2(60); $promedioAlumno6->setUnidad3(100);
$promedioAlumno7->setNombres('Juan'); $promedioAlumno7->setUnidad1(70); $promedioAlumno7->setUnidad2(20); $promedioAlumno7->setUnidad3(70);
$promedioAlumno8->setNombres('Jose'); $promedioAlumno8->setUnidad1(70); $promedioAlumno8->setUnidad2(40); $promedioAlumno8->setUnidad3(99);
$promedioAlumno9->setNombres('josue'); $promedioAlumno9->setUnidad1(70); $promedioAlumno9->setUnidad2(90); $promedioAlumno9->setUnidad3(100);
$promedioAlumno10->setNombres('Jorge'); $promedioAlumno10->setUnidad1(70); $promedioAlumno10->setUnidad2(100); $promedioAlumno10->setUnidad3(99);

//asignar valores a las propiedades del objetos promediosAl guardandolos en un array
$promedios=array($promedioAlumno1->nombres =>$promedioAlumno1->promedio(), 
$promedioAlumno2->nombres =>$promedioAlumno2->promedio(),
$promedioAlumno3->nombres =>$promedioAlumno3->promedio(),
$promedioAlumno4->nombres =>$promedioAlumno4->promedio(),
$promedioAlumno5->nombres =>$promedioAlumno5->promedio(),
$promedioAlumno6->nombres =>$promedioAlumno6->promedio(),
$promedioAlumno7->nombres=>$promedioAlumno7->promedio(),
$promedioAlumno8->nombres =>$promedioAlumno8->promedio(),
$promedioAlumno9->nombres =>$promedioAlumno9->promedio(),
$promedioAlumno10->nombres =>$promedioAlumno10->promedio(),
);
$promediosAl->ordenar($promedios);//envia el arrayb de promedios y nombres al metodo ordenar


//impresiones de los resultados
echo "<br>";
echo "<br> Alumno 1: ".$promedioAlumno1->nombres;
echo "<br> Unidad 1= ".$promedioAlumno1->U1."  Unidad 2= ".$promedioAlumno1->U2."  Unidad 3= ".$promedioAlumno1->U3;
echo "<br> Promedio:  ".$promedioAlumno1->promedio();
echo "<br>";
echo "<br> Alumno 2: ".$promedioAlumno2->nombres;
echo "<br>  Unidad 1= ".$promedioAlumno2->U1."  Unidad 2= ".$promedioAlumno2->U2."  Unidad 3= ".$promedioAlumno2->U3;
echo "<br> Promedio:  ".$promedioAlumno2->promedio();
echo "<br>";
echo "<br> Alumno 3: ".$promedioAlumno3->nombres;
echo "<br> Unidad 1= ".$promedioAlumno3->U1."  Unidad 2= ".$promedioAlumno3->U2."  Unidad 3= ".$promedioAlumno3->U3;
echo "<br> Promedio:  ".$promedioAlumno3->promedio();
echo "<br>";
echo "<br> Alumno 4: ".$promedioAlumno4->nombres;
echo "<br> Unidad 1= ".$promedioAlumno4->U1."  Unidad 2= ".$promedioAlumno4->U2."  Unidad 3= ".$promedioAlumno4->U3;
echo "<br> Promedio:  ".$promedioAlumno4->promedio();
echo "<br>";
echo "<br> Alumno 5: ".$promedioAlumno5->nombres;
echo "<br> Unidad 1= ".$promedioAlumno5->U1."  Unidad 2= ".$promedioAlumno5->U2."  Unidad 3:= ".$promedioAlumno5->U3;
echo "<br> Promedio:  ".$promedioAlumno5->promedio();
echo "<br>";
echo "<br> Alumno 6: ".$promedioAlumno6->nombres;
echo "<br> Unidad 1= ".$promedioAlumno6->U1."  Unidad 2= ".$promedioAlumno6->U2."  Unidad 3:= ".$promedioAlumno6->U3;
echo "<br> Promedio:  ".$promedioAlumno6->promedio();
echo "<br>";
echo "<br> Alumno 7: ".$promedioAlumno7->nombres;
echo "<br> Unidad 1= ".$promedioAlumno7->U1."  Unidad 2= ".$promedioAlumno7->U2."  Unidad 3:= ".$promedioAlumno7->U3;
echo "<br> Promedio:  ".$promedioAlumno7->promedio();
echo "<br>";
echo "<br> Alumno 8: ".$promedioAlumno8->nombres;
echo "<br> Unidad 1= ".$promedioAlumno8->U1."  Unidad 2= ".$promedioAlumno8->U2."  Unidad 3:= ".$promedioAlumno8->U3;
echo "<br> Promedio:  ".$promedioAlumno8->promedio();
echo "<br>";
echo "<br> Alumno 9: ".$promedioAlumno9->nombres;
echo "<br> Unidad 1= ".$promedioAlumno9->U1."  Unidad 2= ".$promedioAlumno9->U2."  Unidad 3:= ".$promedioAlumno9->U3;
echo "<br> Promedio:  ".$promedioAlumno9->promedio();
echo "<br>";
echo "<br> Alumno 10: ".$promedioAlumno10->nombres;
echo "<br> Unidad 1= ".$promedioAlumno10->U1."  Unidad 2= ".$promedioAlumno10->U2."  Unidad 3:= ".$promedioAlumno10->U3;
echo "<br> Promedio:  ".$promedioAlumno10->promedio();
echo "<br>";


?>