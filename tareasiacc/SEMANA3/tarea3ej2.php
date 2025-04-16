<!DOCTYPE html>
<html lang="es">            
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 3 - PHP</title>
    <style> 
        /* Estilos para el formulario y sus elementos */
        form {      
            /* Estilo del formulario */
            width: 50%; 
            margin: 20px auto;
            text-align: center;
        }
        input, button { 
            /* Estilo de los campos de entrada y botón */
            width: 100%;
            margin: 10px;
            padding: 10px;
            font-size: 15px;
        }
        .error { 
            /* Estilo para mensajes de error */
            color: red;
            font-size: 14px;
        }
        .success {
            /* Estilo para mensajes de éxito */
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
    // Inicializar variables para almacenar mensajes de validación de usuario y contraseña
    $mensajeUsuario = "";
    $mensajeContraseña = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si el formulario fue enviado mediante el método POST
        // Obtener datos del formulario
        $nombreUsuario = htmlspecialchars($_POST["nombreUsuario"]); // Sanitiza el nombre de usuario para evitar inyección de código
        $contraseña = htmlspecialchars($_POST["contraseña"]); // Sanitiza la contraseña para evitar inyección de código

        // Función para validar nombre de usuario
        function validarNombreUsuario($nombreUsuario) {
            if (empty($nombreUsuario)) { // Verifica si el nombre de usuario está vacío
                return "El nombre de usuario no puede estar vacío.";
            }
            if (strlen($nombreUsuario) < 6 || strlen($nombreUsuario) > 10) { // Verifica si la longitud está entre 6 y 10 caracteres
                return "El nombre de usuario debe tener entre 6 y 10 caracteres.";
            }
            if (!ctype_alnum($nombreUsuario)) { // Verifica si contiene solo caracteres alfanuméricos
                return "El nombre de usuario solo puede contener caracteres alfanuméricos.";
            }
            if (!ctype_alpha($nombreUsuario[0]) || !ctype_alpha($nombreUsuario[strlen($nombreUsuario) - 1])) { // Verifica si comienza y termina con una letra
                return "El nombre de usuario debe comenzar y terminar con una letra.";
            }
            if (!preg_match('/\d/', $nombreUsuario)) { // Verifica si contiene al menos un número
                return "El nombre de usuario debe contener al menos un número.";
            }
            return "Nombre de usuario válido.";
        }

        // Función para validar contraseña
        function validarContraseña($contraseña) {
            if (empty($contraseña)) { // Verifica si la contraseña está vacía
                return "La contraseña no puede estar vacía.";
            }
            if (strlen($contraseña) !== 8) { // Verifica si la longitud es exactamente 8 caracteres
                return "La contraseña debe tener exactamente 8 caracteres.";
            }
            if (!ctype_upper($contraseña[0])) { // Verifica si comienza con una letra mayúscula
                return "La contraseña debe comenzar con una letra mayúscula.";
            }
            if (!preg_match('/[#\$%&]/', $contraseña)) { // Verifica si contiene al menos un carácter especial (#, $, %, &)
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
        <label for="nombreUsuario"><b>NOMBRE DE USUARIO</b></label><br> // Etiqueta para el campo de nombre de usuario
        <input type="text" id="nombreUsuario" name="nombreUsuario" placeholder="Ingrese su usuario" required><br>
        <span class="<?php echo strpos($mensajeUsuario, 'válido') !== false ? 'success' : 'error'; ?>">
            <?php echo $mensajeUsuario; ?>
        </span><br>
        <br>
        <label for="contraseña"><b>CONTRASEÑA</b></label><br> // Etiqueta para el campo de contraseña
        <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" required><br>
        <span class="<?php echo strpos($mensajeContraseña, 'válida') !== false ? 'success' : 'error'; ?>">
            <?php echo $mensajeContraseña; ?>
        </span><br>
        
        <button type="submit">Validar</button>
    </form>
</body>
</html>
