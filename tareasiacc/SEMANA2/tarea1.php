<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><strong>Registro de Usuarios></strong></title>
</head>
<body>
    <style>
        body {
            background-color:hsl(165, 81.10%, 43.50%);

        }
    </style>
    <h1><span>FORMULARIO DE REGISTRO</span><br>"Innovatek Solutions"</h1>
    
    //REVISAR LINEA 16//

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars(trim($_POST["username"]));
        $email = htmlspecialchars(trim($_POST["email"]));

        if (!empty($username) && !empty($email)) {
            $registro = "Usuario: $username | Correo: $email" . PHP_EOL;
            file_put_contents("usuarios.txt", $registro, FILE_APPEND);
            echo "<h2>¡Registro exitoso!</h2>";
            echo "<p>Gracias por registrarte, <strong>$username</strong>.</p>";
        } else {
            echo "<p style='color:red;'>Error: Todos los campos son obligatorios.</p>";
        }
    }
    
    
    ?>
    <div>
    <form action="" method="POST">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <button type="submit">Registrar</button>
    </form>
    </div>

</body>
</html>
