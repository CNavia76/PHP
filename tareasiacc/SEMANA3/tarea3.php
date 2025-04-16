<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 3 - PHP</title>
</head>
<body>
<h2><strong> SEMANA 3 - PROGRAMACIÓN </strong></h2>
<h3>Ejercicio N°1 - PHP</h3>
    <p><strong>Nombre estudiante:</strong> Carolina Navia Cárdenas</p>
    <p>En este ejercicio, se implementarán funciones para calcular<br> 
    el precio total de las ventas, aplicar descuentos y calcular el<br> total incluyendo impuestos.</p>  

<?php
// Definir constantes
define("DESCUENTO", 0.10); // Descuento del 10%
define("IMPUESTO", 0.15);  // Impuesto del 15%

// Función para calcular el precio total de las ventas
function calcularPrecioTotal($unidades, $precioPorUnidad) {
    return $unidades * $precioPorUnidad;
}

// Función para aplicar descuento si el monto supera los 200 USD
function aplicarDescuento($precioTotal) {
    $descuento = 0;
    if ($precioTotal > 200) {
        $descuento = $precioTotal * DESCUENTO;
    }
    return $descuento;
}

// Función para calcular el total incluyendo impuesto
function calcularTotalConImpuesto($precioTotal, $descuento) {
    $precioConDescuento = $precioTotal - $descuento;
    $impuesto = $precioConDescuento * IMPUESTO;
    return $precioConDescuento + $impuesto;
}

// Ejemplo de uso
$unidadesVendidas = 10;
$precioPorUnidad = 25; // Precio por unidad en USD

$precioTotal = calcularPrecioTotal($unidadesVendidas, $precioPorUnidad);
$descuento = aplicarDescuento($precioTotal);
$totalConImpuesto = calcularTotalConImpuesto($precioTotal, $descuento);

echo "<br>";
echo "<b>Precio Total: $ </b>" . number_format($precioTotal, 2) . "<br>";
echo "<b>Unidades Vendidas: </b>" . $unidadesVendidas . "<br>";
echo "<b>Precio por Unidad: $</b>" . number_format($precioPorUnidad, 2) . "<br>";  
echo "<b>El porcentaje de descuento por aplicar es: </b>" . (DESCUENTO * 100) . "%<br>";
echo "<b>El monto de descuento aplicado es: $</b>" . number_format($descuento, 2) . "<br>";
echo "<b>Precio Total con Descuento: $</b>" . number_format($precioTotal - $descuento, 2) . "<br>";
echo "<b>Descuento Aplicado: $</b>" . number_format($descuento, 2) . "<br>";
echo "<b>Total con Impuesto: $</b>" . number_format($totalConImpuesto, 2) . "<br>";
 
?>
</body>
</html>
