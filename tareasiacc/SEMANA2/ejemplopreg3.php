<?php
function calcularX($a, $b, $c) {
    // Primero, calcular la expresión dentro del paréntesis
    $expresionParentesis = 4 * $a + $b;
    
    // Luego, calcular las potencias
    $bCuadrado = pow($b, 2);
    $aCuadrado = pow($a, 2);
    
    // Ahora, calcular la multiplicación
    $multiplicacion = $a * $c * $expresionParentesis;
    
    // Finalmente, combinar todo para calcular x
    $x = -$b + $bCuadrado - $multiplicacion - $aCuadrado;
    
    return $x;
}

// Ejemplo de uso
$a = 4;
$b = 5;
$c = 6;

$x = calcularX($a, $b, $c);
echo "<strong>JERARQUÍA Y PRECEDENCIA DE OPERADORES EN PHP</strong><br>";
echo "<br>";
echo "<strong>Valores:</strong><br>";
echo "a = $a<br> b = $b<br> c = $c<br>";
echo "<br>"; 
echo "<strong>Expresión:</strong> x = -b + b^2 - a * c * (4a + b) - a^2<br>";  
echo "<br>";   
echo "<strong>El valor de x es:</strong> $x";

?>