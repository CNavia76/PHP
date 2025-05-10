<?php
// Array simulado con nombres de clientes con diferentes formatos
$clientes = [
    " juan pérez   ",
    "MARÍA GONZÁLEZ",
    " carolIna naVIa    ",
    " Ana López ",
    " cARLOS sÁnchez  ",
    "BrUnO pInIlLa  ",
    "              ema herrera           ",
    " mACARENA vIAL   ",
];

// Función para eliminar espacios en blanco utilizando trim, ltrim y rtrim
function limpiarEspacios($listaClientes): void {
    foreach ($listaClientes as $nombre) {
        // Eliminar espacios al inicio y al final con trim()
        $nombre_trim = trim(string: $nombre);

        // Eliminar espacios solo al inicio con ltrim()
        $nombre_ltrim = ltrim(string: $nombre);

        // Eliminar espacios solo al final con rtrim()
        $nombre_rtrim = rtrim(string: $nombre);

        // Mostrar resultados
        echo "Nombre original: [" . $nombre . "]\n";
        echo "Con trim(): [" . $nombre_trim . "]\n";
        echo "Con ltrim(): [" . $nombre_ltrim . "]\n";
        echo "Con rtrim(): [" . $nombre_rtrim . "]\n";
        echo "-----------------------------\n";
    }
}

// Ejecutar función con la lista de clientes
limpiarEspacios(listaClientes: $clientes);
?>