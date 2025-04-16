<?php
// Variables escalares: contienen un único valor simple
$entero = 42; // Tipo entero
$flotante = 3.14; // Tipo flotante
$cadena = "Hola, mundo"; // Tipo cadena
$booleano = true; // Tipo booleano

// Imprimir variables escalares
echo "Variables escalares:<br>";
echo "Entero: $entero<br>";
echo "Flotante: $flotante<br>";
echo "Cadena: $cadena<br>";
echo "Booleano: " . ($booleano ? 'true' : 'false') . "<br>";

echo "<br>"; // Salto de línea adicional

// Variables compuestas: pueden contener múltiples valores o estructuras
$array = [1, 2, 3, "cuatro"]; // Tipo array
$objeto = (object) ["nombre" => "Juan", "edad" => 30]; // Tipo objeto

// Imprimir variables compuestas
echo "Variables compuestas:<br>";
echo "Array: ";
print_r($array);

echo "<br>"; // Salto de línea adicional

echo "Objeto: ";
print_r($objeto);

echo "<br>"; // Salto de línea adicional
?>