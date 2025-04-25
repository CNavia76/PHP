<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Calibri, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 50%;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><strong>EJERCICIO 2</strong></h1>
        <h2>Carolina Navia C.</h2><br>
        <h3>Este es un ejemplo para detectar palabras prohibidas en un comentario.</h3>
        <p>El siguiente código verifica si un comentario contiene alguna palabra prohibida y muestra un mensaje si es así.</p> 
        <p>Por favor, ingrese un comentario en el formulario a continuación:</p><br>

        <!-- Formulario para ingresar un comentario -->
        <form method="POST" action="">
            <label for="comentario">Ingrese su comentario:</label><br>
            <textarea id="comentario" name="comentario" rows="4" cols="50" placeholder="Escriba su comentario aquí..."></textarea><br><br>
            <button type="submit">Enviar</button>
        </form>
        <br>

        <?php
        $palabrasProhibidas = ["prohibida1", "prohibida2", "prohibida3"]; // Define palabras prohibidas
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $comentario = $_POST["comentario"]; // Obtiene el comentario enviado desde el formulario

            for ($i = 0; $i < count($palabrasProhibidas); $i++) {
                if (strpos($comentario, $palabrasProhibidas[$i]) !== false) {
                    echo "<p style='color: red;'>Palabra prohibida detectada: {$palabrasProhibidas[$i]}</p>";
                    break; // Detiene el ciclo al encontrar la primera palabra prohibida
                }
            }
        }
        ?>
    </div>
</body>
</html>
