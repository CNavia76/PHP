<?php

// Variables escalares
$entero = 42;
$flotante = 3.14;
$cadena = "Hola mundo";
$booleano = true;

// Variables compuestas
$arreglo = ["manzana", "banana", "naranja"];
$objeto = new stdClass();
$objeto->nombre = "Juan";
$objeto->edad = 30;

// Explicación de variables escalares
/*
Las variables escalares en PHP son aquellas que contienen un solo valor a la vez.
Los tipos de datos escalares incluyen:

1. Integer (entero): Números enteros sin decimales.
2. Float (flotante): Números con decimales.
3. String (cadena): Secuencias de caracteres.
4. Boolean (booleano): Valores verdadero o falso.

Estas variables son de tipo valor, lo que significa que contienen directamente el valor
asignado. Son simples y no se pueden dividir en partes más pequeñas.
*/

// Demostración de variables escalares
echo "Entero: " . $entero . "<br>";

echo "Flotante: " . $flotante . "<br>";

echo "Cadena: " . $cadena . "<br>";

echo "Booleano: " . ($booleano ? "true" : "false") . "<br>";

// Explicación de variables compuestas
/*
Las variables compuestas en PHP son aquellas que pueden contener múltiples valores.
Los tipos de datos compuestos incluyen:

1. Array (arreglo): Una colección ordenada de elementos con claves y valores.
2. Object (objeto): Una instancia de una clase predefinida.

Estas variables pueden contener otras variables además de sí mismas. Por ejemplo,
un arreglo contiene sus elementos y un objeto contiene sus propiedades.
*/

// Demostración de variables compuestas
echo "Arreglo: " . implode(", ", $arreglo) . "<br>";

echo "Objeto: Nombre - " . $objeto->nombre . ", Edad - " . $objeto->edad . "<br>";

// Uso práctico de variables escalares y compuestas
/*
Las variables escalares son útiles para almacenar datos simples y realizar operaciones
básicas. Por ejemplo, podemos usar variables enteras para contar, flotantes para
cálculos precisos, cadenas para texto y booleanos para condiciones.

Las variables compuestas son esenciales para estructurar datos más complejos. Los
arreglos permiten almacenar y manipular colecciones de datos, mientras que los objetos
son fundamentales para la programación orientada a objetos, permitiendo encapsular
datos y comportamientos relacionados.
*/

// Ejemplo de uso práctico
$totalFrutas = count($arreglo);

echo "Total de frutas: " . $totalFrutas . "<br>";

$edadEnDiasAproximados = $objeto->edad * 365.25;

echo $objeto->nombre . " tiene aproximadamente " . $edadEnDiasAproximados . " días de vida.<br>";

?>
