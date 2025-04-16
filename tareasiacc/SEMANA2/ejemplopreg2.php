<?php
// Asignar valores de a, b y c
$a = 3; // Valor de a
$b = 4; // Valor de b
$c = 10; // Valor de c

// Calcular ab + ac + bc
$sumaProductos = $a * $b + $a * $c + $b * $c;

// Calcular A según la ecuación
$A = 2 * $sumaProductos;

// Mostrar los valores utilizados y el resultado
echo "Resultado de la Ecuación A = 2(ab + ac + bc)<br>";
echo "<br>";
echo "Valores utilizados:<br>";
echo "<br>"; 
echo "a = $a<br> b = $b<br> c = $c<br>";
echo "<br>"; 
echo "Valor de ab + ac + bc: $sumaProductos<br>";
echo "<br>"; 
echo "Valor calculado de A: $A<br>";
?>