<?php
// Inicializar arreglos para acumulados
$comensalesPorDia = [];
$comensalesPorArea = [];

// Ejemplo de datos de reservaciones
$reservaciones = [
    ["fecha" => "2025-04-25", "area" => "Terraza", "comensales" => 10],
    ["fecha" => "2025-04-25", "area" => "Salón", "comensales" => 15],
    ["fecha" => "2025-04-26", "area" => "Terraza", "comensales" => 8],
    ["fecha" => "2025-04-26", "area" => "Salón", "comensales" => 12],
];

// Procesar nueva reserva si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fecha = $_POST["fecha"];
    $area = $_POST["area"];
    $comensales = (int)$_POST["comensales"];
    $nombre = $_POST["nombre"];

    // Agregar la nueva reserva
    $reservaciones[] = ["fecha" => $fecha, "area" => $area, "comensales" => $comensales, "nombre" => $nombre];
}

// Calcular acumulados
foreach ($reservaciones as $reserva) {
    $fecha = $reserva["fecha"];
    $area = $reserva["area"];
    $cantidad = $reserva["comensales"];

    // Acumular comensales por día
    if (!isset($comensalesPorDia[$fecha])) {
        $comensalesPorDia[$fecha] = 0;
    }
    $comensalesPorDia[$fecha] += $cantidad;

    // Acumular comensales por área y fecha
    if (!isset($comensalesPorArea[$fecha])) {
        $comensalesPorArea[$fecha] = [];
    }
    if (!isset($comensalesPorArea[$fecha][$area])) {
        $comensalesPorArea[$fecha][$area] = 0;
    }
    $comensalesPorArea[$fecha][$area] += $cantidad;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTAURANT </title>
    <style>
    table {
        width: 50%; /* Cambiar el ancho de la tabla al 50% */
        margin-left: 0; /* Alinear la tabla a la izquierda */
        border-collapse: collapse;
        background-color: rgba(255, 255, 255, 0.5); /* Fondo blanco con 50% de transparencia */
    }
    th, td {
        border: 3px solid black; /* Bordes negros */
        padding: 4px; /* Reducir el relleno para hacerlo más compacto */
        text-align: left;
        font-size: 120%; /* Aumentar el tamaño de la letra en un 20% */
        font-weight: bold; /* Hacer el texto en negrita */
    }
    th {
        background-color: hsl(0, 91.30%, 77.50%); /* Cambiar el color de fondo del encabezado */
        text-align: center; /* Centrar el texto de los encabezados */
    }
    tbody tr:nth-child(odd) {
        background-color: rgba(247, 189, 189, 0.7); /* Color de fondo para filas impares con 50% de transparencia */
    }
    tbody tr:nth-child(even) {
        background-color: rgba(247, 189, 189, 0.7); /* Color de fondo para filas pares con 50% de transparencia */
    }
    header {
        text-align: center;
        margin-bottom: 20px;
    }
    header img {
        max-width: 150px;
        border: 2px solid black;
    }
    body {
        background-image: url('fondo.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    form label, form button {
        font-weight: bold; /* Hacer el texto del formulario en negrita */
    }
    </style>
</head>
<body>
    <!-- Encabezado con imagen -->
    <header>
        <img src="logo.png" alt="Logo del Restaurante">
        <h1>REPORTE DE RESERVAS</h1>
    </header>

    <!-- Formulario para agregar reservas -->
    <h2><strong>AGREGAR NUEVA RESERVA</strong></h2>
    <form method="POST">
        <label for="fecha">FECHA:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="area">ÁREA:</label>
        <select id="area" name="area" required>
            <option value="Terraza">TERRAZA</option>
            <option value="Salón">SALÓN</option>
        </select><br><br>

        <label for="comensales">NÚMERO DE COMENSALES:</label>
        <input type="number" id="comensales" name="comensales" min="1" required><br><br>

        <label for="nombre">NOMBRE DEL CLIENTE:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <button type="submit">AGREGAR RESERVA</button>
    </form>

    <!-- Tabla de reporte -->
    <table>
        <thead>
            <tr>
                <th>FECHA</th>
                <th>AREA</th>
                <th>COMENSALES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comensalesPorDia as $fecha => $totalComensales): ?>
                <tr>
                    <td rowspan="<?= count($comensalesPorArea[$fecha]) + 1 ?>"><?= $fecha ?></td>
                    <td colspan="2">Total: <?= $totalComensales ?></td>
                </tr>
                <?php foreach ($comensalesPorArea[$fecha] as $area => $comensalesArea): ?>
                    <tr>
                        <td><?= $area ?></td>
                        <td><?= $comensalesArea ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

