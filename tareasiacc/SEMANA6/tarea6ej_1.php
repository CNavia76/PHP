<?php
// Array simulado con nombres de clientes con diferentes formatos
$clientes = [
    " juan pérez   ",
    "MARÍA   GONZÁLEZ",
    " carolIna   naVIa    ",
    " Ana  López ",
    " cARLOS sÁnchez  ",
    "BrUnO   pInIlLa  ",
    "              ema herrera           ",
    " mACARENA vIAL   ",
];
// Función para procesar los nombres de clientes
function procesarNombresClientes($listaClientes): void {
    
    foreach ($listaClientes as $nombre) {
        // Eliminar espacios en blanco al inicio y al final
        $nombre_limpio = trim(string: $nombre);

        // Convertir el nombre a mayúsculas (considerando caracteres UTF-8)
        $nombre_mayusculas = mb_strtoupper(string: $nombre_limpio, encoding: "UTF-8");

        // Convertir el nombre a minúsculas (considerando caracteres UTF-8)
        $nombre_minusculas = mb_strtolower(string: $nombre_limpio, encoding: "UTF-8");

        // Convertir la primera letra de la cadena a mayúscula
        $nombre_ucfirst = ucfirst(string: mb_strtolower(string: $nombre_limpio, encoding: "UTF-8"));

        // Convertir la primera letra de cada palabra a mayúscula
        $nombre_ucwords = ucwords(string: mb_strtolower(string: $nombre_limpio, encoding: "UTF-8"));

        // Contar el número de caracteres del nombre limpio
        $num_caracteres = mb_strlen(string: $nombre_limpio, encoding: "UTF-8");

        // Mostrar resultados
        echo "Nombre original: [" . $nombre . "]\n";
        echo "Nombre limpio: [" . $nombre_limpio . "]\n";
        echo "Nombre en mayúsculas: [" . $nombre_mayusculas . "]\n";
        echo "Nombre en minúsculas: [" . $nombre_minusculas . "]\n";
        echo "Primera letra en mayúscula: [" . $nombre_ucfirst . "]\n";
        echo "Primera letra de cada palabra en mayúscula: [" . $nombre_ucwords . "]\n";
        echo "Número de caracteres: " . $num_caracteres . "\n";
        echo "-----------------------------\n";
    }
}
// Ejecutar función con la lista de clientes
procesarNombresClientes(listaClientes: $clientes);
?>