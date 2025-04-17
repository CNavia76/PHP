<?php

// Simulación de variables para pruebas
$comentarioInapropiado = true; // Cambiar a true para probar
$comentarioIrrelevante = true;  // Cambiar a true para probar
$comentarioID = 123; // ID del comentario

// Función para eliminar un comentario
function eliminarComentario($comentarioID) {
    echo "El comentario con ID $comentarioID ha sido eliminado.<br>";
}

// Función para marcar un comentario para revisión
function marcarParaRevision($comentarioID) {
    echo "El comentario con ID $comentarioID ha sido marcado para revisión.<br>";
}

// Función para aprobar un comentario
function aprobarComentario($comentarioID) {
    echo "El comentario con ID $comentarioID ha sido aprobado.<br>";
}

// Lógica de validación del comentario
if ($comentarioInapropiado) {
    eliminarComentario($comentarioID);
} elseif ($comentarioIrrelevante) {
    marcarParaRevision($comentarioID);
} else {
    aprobarComentario($comentarioID);
}

?>
