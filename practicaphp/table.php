<?php

$var1 = "8 am a 3 pm";
$var2 = "3 pm a 10 pm";
$var3 = "10 pm a 6 am";
$var4 = "Producción";
$var5 = "Seguridad";
$var6 = "Logística";

// Definir el array con los datos
$data = [
    ["NOMBRE" => "María Luisa Rojas", "HORARIO" => $var1, "DEPARTAMENTO" => $var4],
    ["NOMBRE" => "José Pérez Márquez", "HORARIO" => $var2, "DEPARTAMENTO" => $var5],
    ["NOMBRE" => "Catalina Donoso Correa", "HORARIO" => $var3, "DEPARTAMENTO" => $var4],
    ["NOMBRE" => "Raúl Lavin", "HORARIO" =>$var1, "DEPARTAMENTO" => $var4],
    ["NOMBRE" => "Jorge Luis Venegas", "HORARIO" => $var2, "DEPARTAMENTO" => $var6]
];

// Iniciar la tabla HTML
echo "<table border='1'>";
echo "<tr><th>NOMBRE</th><th>HORARIO</th><th>DEPARTAMENTO</th></tr>";

// Recorrer el array y crear las filas de la tabla
foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $row["NOMBRE"] . "</td>";
    echo "<td>" . $row["HORARIO"] . "</td>";
    echo "<td>" . $row["DEPARTAMENTO"] . "</td>";
    echo "</tr>";
}

// Cerrar la tabla HTML
echo "</table>";
?>
