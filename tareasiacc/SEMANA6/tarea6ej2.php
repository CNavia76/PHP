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
// Función para aplicar las diferentes funciones
function aplicarFunciones($listaClientes): void {
    foreach ($listaClientes as $nombre) {
        // Eliminar espacios en blanco al inicio y al final
        $nombre_limpio = trim(string: $nombre);

        // Contar caracteres con strlen (no compatible con caracteres especiales)
        $longitud_strlen = strlen(string: $nombre_limpio);

        // Contar caracteres con mb_strlen (compatible con caracteres especiales)
        $longitud_mb_strlen = mb_strlen(string: $nombre_limpio, encoding: "UTF-8");

        // Obtener los primeros 5 caracteres con substr
        $primeros_5 = substr(string: $nombre_limpio, offset: 0, length: 5);

        // Contar la frecuencia de caracteres con count_chars
        $frecuencia_caracteres = count_chars(string: $nombre_limpio, mode: 1);

        // Mostrar resultados
        echo "Nombre original: [" . $nombre . "]\n";
        echo "Nombre limpio: [" . $nombre_limpio . "]\n";
        echo "Longitud con strlen: " . $longitud_strlen . "\n";
        echo "Longitud con mb_strlen: " . $longitud_mb_strlen . "\n";
        echo "Primeros 5 caracteres con substr: [" . $primeros_5 . "]\n";
        echo "Frecuencia de caracteres con count_chars:\n";
        foreach ($frecuencia_caracteres as $ascii => $frecuencia) {
            echo "Carácter '" . chr(codepoint: $ascii) . "' aparece " . $frecuencia . " veces\n";
        }
        echo "-----------------------------\n";
    }
}
// Ejecutar función con la lista de clientes
aplicarFunciones(listaClientes: $clientes);
?>