<?php


$comentario = null; // Inicializar la variable antes del bucle

do {
    $comentario = obtenerSiguienteComentarioPendiente(); // Función que obtiene el siguiente comentario pendiente

    if ($comentario) {
        revisarComentario(comentario: $comentario); // Aplicar reglas de moderación
    }

} while ($comentario !== null);

// Ejemplo de implementación de las funciones
function obtenerSiguienteComentarioPendiente(): string|null {
    static $comentarios = ["Comentario 1", "Comentario 2", "Comentario 3", null]; // Lista de comentarios
    static $indice = 0;

    $comentarioActual = $comentarios[$indice] ?? null;
    $indice++;
    return $comentarioActual;
}

function revisarComentario($comentario): void {
    echo "Revisando: $comentario<br>";
}

?>