<!DOCTYPE html>
<html lang="es">            
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 3 - PHP</title>
    <style> 
        /* Estilos para el formulario y sus elementos */
        form {  
            width: 50%; 
            margin: 20px auto;
            text-align: center;
        }
        input, button {
            margin: 10px;
            padding: 10px;
            font-size: 15px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        .success {
            color: green;
            font-size: 14px;
        }
    </style>
</head>
<body> 
    <h1 style="text-align: center;">SEMANA 3 - PROGRAMACIÓN</h1>  
    <h2 style="text-align: center;"><strong>Ejercicio N°2 - PHP <br>Validación de Usuario y Contraseña</strong></h2>
    <br>

    <?php
    $mensajeUsuario = "";
    $mensajeContraseña = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si el formulario fue enviado mediante el método POST
        // Obtener datos del formulario
        $nombreUsuario = htmlspecialchars($_POST["nombreUsuario"]); // Sanitiza el nombre de usuario para evitar inyección de código
        $contraseña = htmlspecialchars($_POST["contraseña"]); // Sanitiza la contraseña para evitar inyección de código

        // Función para validar nombre de usuario
        function validarNombreUsuario($nombreUsuario) {
            if (empty($nombreUsuario)) {
                return "El nombre de usuario no puede estar vacío.";
            }
            if (strlen($nombreUsuario) < 6 || strlen($nombreUsuario) > 10) {
                return "El nombre de usuario debe tener entre 6 y 10 caracteres.";
            }
            if (!ctype_alnum($nombreUsuario)) {
                return "El nombre de usuario solo puede contener caracteres alfanuméricos.";
            }
            if (!ctype_alpha($nombreUsuario[0]) || !ctype_alpha($nombreUsuario[strlen($nombreUsuario) - 1])) {
                return "El nombre de usuario debe comenzar y terminar con una letra.";
            }
            if (!preg_match('/\d/', $nombreUsuario)) {
                return "El nombre de usuario debe contener al menos un número.";
            }
            return "Nombre de usuario válido.";
        }

        // Función para validar contraseña
        function validarContraseña($contraseña) {
            if (empty($contraseña)) {
                return "La contraseña no puede estar vacía.";
            }
            if (strlen($contraseña) !== 8) {
                return "La contraseña debe tener exactamente 8 caracteres.";
            }
            if (!ctype_upper($contraseña[0])) {
                return "La contraseña debe comenzar con una letra mayúscula.";
            }
            if (!preg_match('/[#\$%&]/', $contraseña)) {
                return "La contraseña debe contener al menos un carácter especial (#, $, %, &).";
            }
            return "Contraseña válida.";
        }

        // Validar y almacenar resultados
        $mensajeUsuario = validarNombreUsuario($nombreUsuario);
        $mensajeContraseña = validarContraseña($contraseña);
    }
    ?>

    <form method="POST" action="">
        <label for="nombreUsuario"><b>NOMBRE DE USUARIO</b></label><br>
        <input type="text" id="nombreUsuario" name="nombreUsuario" placeholder="Ingrese su usuario" required><br>
        <span class="<?php echo strpos($mensajeUsuario, 'válido') !== false ? 'success' : 'error'; ?>">
            <?php echo $mensajeUsuario; ?>
        </span><br>
        <br>
        <label for="contraseña"><b>CONTRASEÑA</b></label><br>
        <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" required><br>
        <span class="<?php echo strpos($mensajeContraseña, 'válida') !== false ? 'success' : 'error'; ?>">
            <?php echo $mensajeContraseña; ?>
        </span><br>
        
        <button type="submit">Validar</button>
    </form>
</body>
</html>
