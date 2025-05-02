<?php
// Array bidimensional asociativo con reservaciones que incluyen el área elegida por el cliente.
$reservaciones = [
    [
        'nombre' => 'Juan Perez',
        'telefono' => '1234567890',
        'comensales' => 4,
        'fecha_hora' => '2025-05-01 20:00',
        'area' => 'Comedor Principal'
    ],
    [
        'nombre' => 'Maria Lopez',
        'telefono' => '0987654321',
        'comensales' => 2,
        'fecha_hora' => '2025-05-01 21:00',
        'area' => 'Terraza'
    ],
    [
        'nombre' => 'Carlos Ruiz',
        'telefono' => '1112223333',
        'comensales' => 3,
        'fecha_hora' => '2025-05-02 19:30',
        'area' => 'Salón VIP'
    ],
    [
        'nombre' => 'Ana Gomez',
        'telefono' => '4445556666',
        'comensales' => 5,
        'fecha_hora' => '2025-05-03 18:00',
        'area' => 'Comedor Principal'
    ],
    [
        'nombre' => 'Luis Martinez',
        'telefono' => '7778889999',
        'comensales' => 2,
        'fecha_hora' => '2025-05-03 20:00',
        'area' => 'Terraza'
    ]
];

// Agrupar reservaciones por fecha y área
$comensalesPorDia = [];
$comensalesPorArea = [];

foreach ($reservaciones as $reserva) {
    $fecha = date('Y-m-d', strtotime($reserva['fecha_hora']));
    $area = $reserva['area'];

    // Inicializar contadores si no existen
    if (!isset($comensalesPorDia[$fecha])) {
        $comensalesPorDia[$fecha] = 0;
        $comensalesPorArea[$fecha] = [];
    }
    if (!isset($comensalesPorArea[$fecha][$area])) {
        $comensalesPorArea[$fecha][$area] = 0;
    }

    // Sumar comensales
    $comensalesPorDia[$fecha] += $reserva['comensales'];
    $comensalesPorArea[$fecha][$area] += $reserva['comensales'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORTE DE RESERVAS</title>
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
            background-color: rgba(241, 191, 191, 0.7); /* Fondo blanco semitransparente */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            text-align: center;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        header img {
            max-width: 200px;
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <!-- Encabezado con imagen -->
    <header>
        <img src="logo.png" alt="Logo del Restaurante">
        <h1>REPORTE DE RESERVAS</h1><br>

    </header>

    <!-- Formulario para agregar reservas -->
    <h2>AGREGAR NUEVA RESERVA</h2>
    <form method="POST">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="area">Área:</label>
        <select id="area" name="area" required>
            <option value="Terraza">Terraza</option>
            <option value="Salón">Salón VIP</option>
            <option value="Comedor">Comedor Principal</option>
        </select><br><br>

        <label for="comensales">Número de Comensales:</label>
        <input type="number" id="comensales" name="comensales" min="1" required><br><br>

        <label for="nombre">Nombre del Cliente:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="telefono">Teléfono del Cliente:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <button type="submit">Agregar Reserva</button>
    </form>

    <!-- Tabla de reporte -->
    <table>
        <thead>
            <tr>
                <th>FECHA</th>
                <th>ÁREA</th>
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

