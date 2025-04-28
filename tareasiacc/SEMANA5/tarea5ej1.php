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
    <title>Reporte de Comensales</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Reporte de Comensales</h1>
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

