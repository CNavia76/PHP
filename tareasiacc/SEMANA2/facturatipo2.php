<?php
// Verifica si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos de la empresa
    $nombreEmpresa = "Mi Tienda Online";
    $direccionEmpresa = "Calle Falsa 123, Ciudad";
    $telefonoEmpresa = "555-1234";
    $emailEmpresa = "info@mitienda.com";

    // Datos del cliente
    $nombreCliente = $_POST["nombreCliente"];
    $direccionCliente = $_POST["direccionCliente"];

    // Productos comprados (simulados)
    $productos = [
        ["nombre" => "Producto A", "precio" => 20.00, "cantidad" => $_POST["cantidadProductoA"]],
        ["nombre" => "Producto B", "precio" => 50.00, "cantidad" => $_POST["cantidadProductoB"]],
        ["nombre" => "Producto C", "precio" => 10.00, "cantidad" => $_POST["cantidadProductoC"]]
    ];

    // Tasa de IVA
    $tasaIVA = 0.19; // 19%

    // Calcula subtotal, IVA y total
    $subtotal = 0;
    foreach ($productos as $producto) {
        $subtotal += $producto["precio"] * $producto["cantidad"];
    }

    $iva = $subtotal * $tasaIVA;
    $total = $subtotal + $iva;

    // Formatea los números a moneda
    $formatoMoneda = '%.2f'; // Dos decimales
} else {
    // Si no se han enviado datos, muestra el formulario
?>
<!DOCTYPE html>
<html>
<head>
    <title>Factura de Compra</title>
</head>
<body>
    <h2>Ingrese los datos para generar la factura</h2>
    <form method="POST" action="">
        <h3>Datos del Cliente</h3>
        <label for="nombreCliente">Nombre:</label>
        <input type="text" id="nombreCliente" name="nombreCliente" required><br>
        <label for="direccionCliente">Dirección:</label>
        <input type="text" id="direccionCliente" name="direccionCliente" required><br>

        <h3>Cantidad de Productos</h3>
        <label for="cantidadProductoA">Producto A:</label>
        <input type="number" id="cantidadProductoA" name="cantidadProductoA" value="0" min="0"><br>
        <label for="cantidadProductoB">Producto B:</label>
        <input type="number" id="cantidadProductoB" name="cantidadProductoB" value="0" min="0"><br>
        <label for="cantidadProductoC">Producto C:</label>
        <input type="number" id="cantidadProductoC" name="cantidadProductoC" value="0" min="0"><br>

        <button type="submit">Generar Factura</button>
    </form>
</body>
</html>
<?php
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Factura de Compra</title>
    <style>
        body { font-family: sans-serif; }
        .factura { width: 600px; margin: 20px auto; border: 1px solid #ccc; padding: 20px; }
        .empresa { text-align: right; }
        .cliente { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .totales { margin-top: 20px; text-align: right; }
    </style>
</head>
<body>
    <div class="factura">
        <div class="empresa">
            <h2><?php echo $nombreEmpresa; ?></h2>
            <p><?php echo $direccionEmpresa; ?></p>
            <p>Teléfono: <?php echo $telefonoEmpresa; ?></p>
            <p>Email: <?php echo $emailEmpresa; ?></p>
        </div>

        <div class="cliente">
            <h3>Cliente:</h3>
            <p><?php echo $nombreCliente; ?></p>
            <p><?php echo $direccionCliente; ?></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto["nombre"]; ?></td>
                        <td>$<?php echo sprintf($formatoMoneda, $producto["precio"]); ?></td>
                        <td><?php echo $producto["cantidad"]; ?></td>
                        <td>$<?php echo sprintf($formatoMoneda, $producto["precio"] * $producto["cantidad"]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="totales">
            <p>Subtotal: $<?php echo sprintf($formatoMoneda, $subtotal); ?></p>
            <p>IVA (19%): $<?php echo sprintf($formatoMoneda, $iva); ?></p>
            <h3>Total: $<?php echo sprintf($formatoMoneda, $total); ?></h3>
        </div>

        <p>Gracias por su compra!</p>
    </div>
</body>
</html>
