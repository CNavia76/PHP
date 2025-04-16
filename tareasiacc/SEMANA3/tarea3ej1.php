<!DOCTYPE html> <!-- DOCTYPE html> indica el tipo de documento y la versión de HTML utilizada.-->
<html lang="es">
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 3 - PHP</title>
    <style> /* Estilos CSS para la tabla */
        table { /* Estilo de la tabla */
            border-collapse: collapse; ;
            width: 50%; /*Ancho de la tabla*/
            margin: 20px auto; /*Centrar la tabla*/
            font-family: Calibri; /*Fuente de la tabla*/
        }
        th, td { /* Estilo de las celdas de la tabla */
            border: 1px solid #000; /*Bordes de la tabla*/
            padding: 8px;   /*Espacio entre el texto y los bordes de la tabla*/
            text-align: left;   /*Alineación del texto en la tabla*/ 
        }
        th { /* Estilo de los encabezados de la tabla */
            background-color:rgb(142, 247, 93);
            text-align: center; /*Centra los encabezados de la tabla*/
        }
    </style>
</head>
<body>
<h2 style="text-align: center;"><strong> SEMANA 3 - PROGRAMACIÓN </strong></h2>  
<h3 style="text-align: center;">Ejercicio N°1 - PHP</h3>
<p style="text-align: center;"><strong>Nombre estudiante:</strong> Carolina Navia Cárdenas</p>
<br>
<p style="text-align: center;">En este ejercicio, se implementarán funciones para calcular el precio
     total de las ventas, aplicar descuentos y calcular el total incluyendo impuestos.</p>  
<br>
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

// 
$unidadesVendidas = 10;
$precioPorUnidad = 25; // Precio por unidad en USD

$precioTotal = calcularPrecioTotal($unidadesVendidas, $precioPorUnidad);
$descuento = aplicarDescuento($precioTotal);
$totalConImpuesto = calcularTotalConImpuesto($precioTotal, $descuento);
?>

<table>
    <tr>
        <th>DESCRIPCIÓN</th>
        <th>VALOR</th>
    </tr>
    <tr>
        <td><b>Unidades Vendidas</b></td>
        <td><?php echo $unidadesVendidas; ?> unidades</td>
    </tr>
    <tr>
        <td><b>Precio por Unidad</b></td>
        <td>US$<?php echo number_format($precioPorUnidad, 2); ?></td>
    </tr>
    <tr>
        <td><b>Precio Total</b></td>
        <td>US$<?php echo number_format($precioTotal, 2); ?></td>
    </tr>
    <tr>
        <td><b>Porcentaje de Descuento</b></td>
        <td><?php echo (DESCUENTO * 100); ?>%</td>
    </tr>
    <tr>
        <td><b>Monto de Descuento</b></td>
        <td>US$<?php echo number_format($descuento, 2); ?></td>
    </tr>
    <tr>
        <td><b>Precio Total con Descuento</b></td>
        <td>US$<?php echo number_format($precioTotal - $descuento, 2); ?></td>
    </tr>
    <tr>
        <td><b>Porcentaje de Impuesto</b></td>
        <td><?php echo (IMPUESTO * 100); ?>%</td>
    </tr>
    <tr>
        <td><b>Total con Impuesto</b></td>
        <td><b>US$<?php echo number_format($totalConImpuesto, 2); ?></b></td>
    </tr>
</table>
</body>
</html>