<?php

$reservaciones = [
    [
        "nombre" => "Carolina Navia",           // Nombre del cliente
        "telefono" => "1234567890",             // Teléfono del cliente
        "comensales" => 4,                      // Número de comensales
        "fecha_hora" => "2025-05-01 20:00",     // Fecha y hora de la reserva
        "area" => "Comedor Principal",          // Área de la reserva
        "menu" => "Menú del día",               // Menú seleccionado  
    ],
    [
        "nombre" => "Alejandro Silva",          // Nombre del cliente
        "telefono" => "0987654321",             // Teléfono del cliente
        "comensales" => 2,                      // Número de comensales
        "fecha_hora" => "2025-05-01 21:00",     // Fecha y hora de la reserva
        "area" => "Terraza",                    // Área de la reserva
        "menu" => "Menú Vegetariano",           // Menú seleccionado
     ],
    [
        "nombre" => "Belén Pinilla",            // Nombre del cliente
        "telefono" => "1112223333",             // Teléfono del cliente
        "comensales" => 3,                      // Número de comensales
        "fecha_hora" => "2025-05-02 19:30",     // Fecha y hora de la reserva
        "area" => "Salón VIP",                  // Área de la reserva
        "menu" => "Menú Vegetariano",           // Menú seleccionado
    ],
    [
        "nombre" => "Catalina Bahamondes",      //Nombre del cliente
        "telefono" => "4445556666",             // Teléfono del cliente
        "comensales" => 5,                      // Número de comensales
        "fecha_hora" => "2025-05-03 18:00",     //Fecha y hora de la reserva
        "area" => "Comedor Principal",          // Área de la reserva
        "menu" => "Menú del día",               // Menú seleccionado
    ],
    [
        "nombre" => "Riccardo Navia",           // Nombre del cliente
        "telefono" => "7778889999",             // Teléfono del cliente
        "comensales" => 2,                      // Número de comensales
        "fecha_hora" => "2025-05-03 20:00",     // Fecha y hora de la reserva
        "area" => "Terraza",                    // Área de la reserva
        "menu" => "Menú Especial",              // Menú seleccionado
    ]
];

// Procesar el formulario para agregar una nueva reserva
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nuevaReserva = [
        "nombre" => $_POST["nombre"],
        "telefono" => $_POST["telefono"],
        "comensales" => (int)$_POST["comensales"],
        "fecha_hora" => $_POST["fecha"] . " " . $_POST["hora"],
        "area" => $_POST["area"],
        "menu" => $_POST["menu"]
    ];

    // Agregar la nueva reserva al array de reservaciones
    $reservaciones[] = $nuevaReserva;
}

// Agrupar reservaciones por fecha y área
$comensalesPorDia = [];  // Nuevo array para almacenar los comensales por día
$comensalesPorArea = []; // Nuevo array para almacenar los comensales por área
$diasDeLaSemana = []; // Nuevo array para almacenar los días de la semana

foreach ($reservaciones as $reserva) {
    $fecha = date(format: "Y-m-d", timestamp: strtotime(datetime: $reserva["fecha_hora"]));
    $area = $reserva["area"];
    $diaSemana = date(format: "l", timestamp: strtotime(datetime: $reserva["fecha_hora"])); // Obtener el día de la semana en inglés

    // Traducir el día de la semana al español
    $diasEnEspanol = [
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miércoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sábado",
        "Sunday" => "Domingo"
    ];
    $diaSemanaEspanol = $diasEnEspanol[$diaSemana];

    // Guardar el día de la semana en el array
    $diasDeLaSemana[$fecha] = $diaSemanaEspanol;

    // Inicializar contadores si no existen
    if (!isset($comensalesPorDia[$fecha])) {
        $comensalesPorDia[$fecha] = 0;
        $comensalesPorArea[$fecha] = [];
    }
    if (!isset($comensalesPorArea[$fecha][$area])) {
        $comensalesPorArea[$fecha][$area] = 0;
    }

    // Sumar comensales
    $comensalesPorDia[$fecha] += $reserva["comensales"];
    $comensalesPorArea[$fecha][$area] += $reserva["comensales"];
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
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url("fondo.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(241, 191, 191, 0.7); /* Fondo blanco semitransparente */
        }
        th, td {
            border: 1px solid brown;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: hsla(0, 95.80%, 81.20%, 0.70);
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
        <label for="fecha"><strong>FECHA:</strong></label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="nombre"><strong>NOMBRE DEL CLIENTE:</strong></label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="area"><strong>ÁREA:</strong></label>
        <select id="area" name="area" required>
            <option value="Terraza">Terraza</option>
            <option value="Salón VIP">Salón VIP</option>
            <option value="Comedor Principal">Comedor Principal</option>
        </select><br><br>

        <label for="menu"><strong>MENÚ:</strong></label>
        <select id="menu" name="menu" required>
            <option value="Menú Especial">Menú Especial</option>
            <option value="Menú del Día">Menú del Día</option>
            <option value="Menú Vegetariano">Menú Vegetariano</option>
        </select><br><br>

        <label for="comensales"><strong>NÚMERO DE COMENSALES:</strong></label>
        <input type="number" id="comensales" name="comensales" min="1" required><br><br>

        <label for="telefono"><strong>TELÉFONO DEL CLIENTE:</strong></label>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="hora"><strong>HORA RESERVA:</strong></label>
        <input type="time" id="hora" name="hora" required><br><br>

        <button type="submit"><strong>Agregar Reserva</strong></button>
    </form>

    <!-- Tabla del Reporte -->
    <table>
        <thead>
            <tr>
                <th>FECHA</th>
                <th>DÍA</th>
                <th>ÁREA</th>
                <th>COMENSALES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comensalesPorDia as $fecha => $totalComensales): ?>
                <tr>
                    <td rowspan="<?= count(value: $comensalesPorArea[$fecha]) + 1 ?>"><?= $fecha ?></td>
                    <td rowspan="<?= count(value: $comensalesPorArea[$fecha]) + 1 ?>"><?= $diasDeLaSemana[$fecha] ?></td>
                    <td colspan="2"><strong>TOTAL:</strong> <?= $totalComensales ?></td>
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
    <br><br>
</body>
</html>

