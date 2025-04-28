<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderación de Comentarios</title>
    <style>
        body {
            display: bottom;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        form {
            margin: 20px 0;
        }
        textarea {
            width: 100%;
            max-width: 400px;
        }
        button {
            margin: 5px;
        }
        h1, h2, p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
   <h1>Bienvenido al Sistema de Moderación de Comentarios</h1>
    <h2>Carolina Navia C.</h2>
    <p>Ingrese un comentario y el sistema lo moderará automáticamente.</p><br>
    <form method="post">
        <label for="comentario">Ingrese un comentario:</label><br>
        <textarea id="comentario" name="comentario" rows="4" cols="50" placeholder="Escriba su comentario aquí..."></textarea><br><br>
        <button type="submit" name="accion" value="enviar">Enviar</button>
    </form>

    <hr>

    <?php
    // Palabras prohibidas en los comentarios, se pueden agregar más palabras...    
    // Palabras prohibidas en los comentarios, se pueden agregar más palabras...    
    $palabras = ["guerra", "muerte", "odio", "violencia", "discriminación"];

    // Verificar si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $accion = $_POST['accion'] ?? '';
        $comentario = $_POST['comentario'] ?? '';

        if ($accion === 'enviar' && !empty($comentario)) {
            echo "<h2>Comentario recibido:</h2>";
            echo "<p id='comentario-mostrado'>" . htmlspecialchars($comentario) . "</p>";

            // Procesar el comentario
            echo "<h3>Resultado de la moderación:</h3>";
            $palabraDetectada = false;
            foreach ($palabras as $palabra) {
                if (stripos($comentario, $palabra) !== false) {
                    echo "<p>La palabra <strong>'$palabra'</strong> fue detectada en el comentario.</p>";
                    $palabraDetectada = true;
                }
            }

            if (!$palabraDetectada) {
                echo "<p>No se detectaron palabras prohibidas en el comentario.</p>";
            }

            // Mostrar botones para modificar o eliminar comentarios...
            echo "<h3>¿Qué desea hacer con el comentario?</h3>";
            // Mostrar botones para modificar o eliminar comentarios...
            echo "<h3>¿Qué desea hacer con el comentario?</h3>";
            echo '<form method="post">';
            echo '<input type="hidden" name="comentario" value="' . htmlspecialchars($comentario) . '">';
            echo '<button type="submit" name="accion" value="modificar">Modificar</button>';
            echo '<button type="submit" name="accion" value="eliminar">Eliminar</button>';
            echo '</form>';
        } elseif ($accion === 'modificar') {
            echo '<h2>Modificar Comentario</h2>';
            echo '<form method="post">';
            echo '<textarea name="comentario" rows="4" cols="50">' . htmlspecialchars($comentario) . '</textarea><br><br>';
            echo '<button type="submit" name="accion" value="enviar">Guardar</button>';
            echo '</form>';
        } elseif ($accion === 'eliminar') {
            echo "<p style='color: red;'>El comentario ha sido eliminado.</p>";
        } else {
            echo "<p style='color: red;'>Por favor, ingrese un comentario antes de enviar.</p>";
        }
    }
    ?>


</html></body></body>
</html>
