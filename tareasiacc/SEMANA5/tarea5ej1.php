<?php
// Inicializar arreglos para acumulados
$comensalesPorDia = [];
$comensalesPorArea = [];
$ingresosPorDia = []; // Nuevo arreglo para almacenar los ingresos por día

// Inicializar el arreglo de reservaciones vacío
$reservaciones = [];

// Precio fijo por comensal
$precioPorComensal = 20;

// Procesar nueva reserva si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fecha = $_POST["fecha"];
    $area = $_POST["area"];
    $comensales = (int)$_POST["comensales"];
    $nombre = $_POST["nombre"];

    // Agregar la nueva reserva
    $reservaciones[] = ["fecha" => $fecha, "area" => $area, "comensales" => $comensales, "nombre" => $nombre];
}

// Ordenar las reservaciones por fecha
usort($reservaciones, function ($a, $b) {
    return strcmp($a["fecha"], $b["fecha"]);
});

// Calcular acumulados solo si hay reservaciones
$totalComensales = 0;
$totalIngresos = 0;

if (!empty($reservaciones)) {
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

        // Calcular ingresos por día
        if (!isset($ingresosPorDia[$fecha])) {
            $ingresosPorDia[$fecha] = 0;
        }
        $ingresosPorDia[$fecha] += $cantidad * $precioPorComensal;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Comensales</title>
    <style>
        body {
            background-image: url('fondo.png'); /* Ruta de la imagen */
            background-size: cover; /* Ajustar la imagen para cubrir toda la página */
            background-repeat: no-repeat; /* Evitar que la imagen se repita */
            background-attachment: fixed; /* Fijar la imagen al fondo */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semitransparente */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        header img {
            max-width: 100px;
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <!-- Encabezado con imagen -->
    <header>
        <img src="logo.png" alt="Logo del Restaurante">
        <h1>Reporte de Comensales</h1>
    </header>

    <!-- Formulario para agregar reservas -->
    <h2>Agregar Nueva Reserva</h2>
    <form method="POST">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="area">Área:</label>
        <select id="area" name="area" required>
            <option value="Terraza">Terraza</option>
            <option value="Salón">Salón</option>
        </select><br><br>

        <label for="comensales">Número de Comensales:</label>
        <input type="number" id="comensales" name="comensales" min="1" required><br><br>

        <label for="nombre">Nombre del Cliente:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <button type="submit">Agregar Reserva</button>
    </form>

    <!-- Tabla de reporte -->
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Área</th>
                <th>Comensales</th>
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

