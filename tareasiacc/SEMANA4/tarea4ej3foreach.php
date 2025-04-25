<?php
// Array de comentarios (simplificado)
$comentarios = [
    ['id' => 1, 'texto' => 'Buen artículo', 'respuestas' => [
        ['texto' => 'Gracias por tu comentario'],
        ['texto' => 'Totalmente de acuerdo']
    ]],
    ['id' => 2, 'texto' => 'No me gustó', 'respuestas' => []]
];

// Recorrer comentarios y sus respuestas
foreach ($comentarios as $comentario) {
    echo "Comentario: " . $comentario['texto'] . "<br>";

    // Recorrer respuestas del comentario
    foreach ($comentario['respuestas'] as $respuesta) {
        echo "&nbsp;&nbsp;Respuesta: " . $respuesta['texto'] . "<br>";
    }
}
?> 