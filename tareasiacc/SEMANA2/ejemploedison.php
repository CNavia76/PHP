<?php
use parallel\Events\Event\Type;
use parallel\Events\Input;

// Facturación TecnoSoft
function generarfactura($nombrecliente, $rutcliente, $direccion, $productos, $impuesto) {
    $subtotal = 0;
    foreach ($productos as $producto) {
        $subtotal += $producto[1];
    }
    $totalimpuesto = $subtotal * $impuesto;
    $total = $subtotal + $totalimpuesto;

    echo "=================Factura===========================<br>";
    echo "* Cliente: $nombrecliente<br>";
    echo "* Rut del Cliente: $rutcliente<br>";
    echo "* Dirección del cliente: $direccion<br>";
    echo "* Productos comprados:<br>";
    foreach ($productos as $producto) {
        echo "- " . $producto[0] . ": $" . number_format($producto[1], 2) . "<br>";
    }
    echo "<br>Subtotal: $" . number_format($subtotal, 2) . "<br>";
    echo "Impuesto (" . ($impuesto * 100) . "%): $" . number_format($totalimpuesto, 2) . "<br>";
    echo "Total a pagar: $" . number_format($total, 2) . "<br>";
}

// Datos de entrada para la factura
$nombrecliente = "Nombre de Ejemplo";
$rutcliente = "11.111.111-1";
$direccion = "Dirección de ejemplo";
$productos = array(
    array("Jabones", 5000),
    array("Shampoo", 8000),
    array("Acondicionador", 6000)
);
$impuesto = 0.19; // Impuesto en Chile (19%)

// Generar la factura
generarfactura($nombrecliente, $rutcliente, $direccion, $productos, $impuesto);

// Función para calcular dimensiones
function CalcularA($altura, $profundidad, $ancho) {
    if (($profundidad + $ancho) == 0) {
        return "Error: El resultado no puede ser profundidad + ancho = 0<br>";
    }
    return ($altura - 2 * $profundidad * $ancho) / (2 * ($profundidad + $ancho));
}

// Datos de entrada para el cálculo de dimensiones
$altura = 40;
$profundidad = 32;
$ancho = 55;

// Solución final
$resultado = CalcularA($altura, $profundidad, $ancho);
echo "<br>Resultado del cálculo de dimensiones: $resultado<br>";

?>