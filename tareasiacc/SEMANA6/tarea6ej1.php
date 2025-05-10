<?php
// Array simulado con nombres de clientes con diferentes formatos
$clientes = [
    " juan pérez   ",
    "MARÍA   GONZÁLEZ",
    " carolIna   naVIa    ",
    " Ana  López ",
    " cARLOS sÁnchez  ",
    "BrUnO   pInIlLa  ",
    "           ema herrera",
    " mACARENA vIAL   ",
];

// Función para procesar los nombres de clientes
function procesarNombresClientes($listaClientes): void {
    foreach ($listaClientes as $nombre) {
        // Eliminar espacios en blanco al inicio y al final
        $nombre_limpio = trim(string: $nombre);

        // Convertir el nombre a mayúsculas (considerando caracteres UTF-8)
        $nombre_mayusculas = mb_strtoupper(string: $nombre_limpio, encoding: "UTF-8");

        // Contar el número de caracteres del nombre limpio
        $num_caracteres = mb_strlen(string: $nombre_limpio, encoding: "UTF-8");

        // Mostrar resultados
        echo "Nombre original: [" . $nombre . "]<br>";
        echo "Nombre limpio: [" . $nombre_limpio . "]<br>";
        echo "Nombre en mayúsculas: [" . $nombre_mayusculas . "]<br>";
        echo "Número de caracteres: " . $num_caracteres . "<br>";
        echo "-----------------------------<br>";
    }
}

// Ejecutar función con la lista de clientes
procesarNombresClientes(listaClientes: $clientes);
?>
