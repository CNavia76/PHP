<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLÍNICA TRAUMATOLÓGICA "EL BIENESTAR"</title>
    <style>
        /* Estilo para la imagen de fondo */
        body {
            background-image: url('traumatologia-1.jpg'); /* Cambia 'traumatologia-1.jpg' por la ruta de tu imagen */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Estilo para el header */
        header {
            background-color:rgb(65, 195, 238, 0.4); /* Celeste con transparencia */
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
            color: #fff; /* Letras título en blanco */
        }

        /* Contenedor para los formularios en dos columnas */
        .form-container {
            display: flex;
            justify-content: space-around; /* Espacio entre las columnas */
            align-items: flex-start; /* Alinear ambos formularios en la parte superior */
            margin: 50px auto;
            max-width: 1200px;
        }

        /* Estilo para los formularios */
        form {
            background-color: hsla(210, 81.20%, 83.30%, 0.90); /* Fondo blanco semitransparente */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 45%; /* Ancho de cada formulario */
            text-align: center; /* Centrar el contenido del formulario */
        }
        
        input, select, textarea {
            width: 90%; /* Ajustar el ancho de los campos */
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block; /* Asegurar que los campos estén en bloques */
            margin-left: auto; /* Centrar horizontalmente */
            margin-right: auto; /* Centrar horizontalmente */
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            width: 50%; /* Ajustar el ancho del botón */
            margin-top: 15px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>CLÍNICA TRAUMATOLÓGICA<br>EL BIENESTAR<br>Gestión de Pacientes y Acceso Administrativo</h1>
    </header>

    <div class="form-container">
        <!-- Formulario de registro de pacientes -->
        <form method="POST" action="">
            <h3>REGISTRO DE PACIENTES</h3>
            Nombre: <input type="text" name="nombre" required><br>
            Apellido: <input type="text" name="apellido" required><br>
            Identificación: <input type="text" name="identificacion" required><br>
            Sexo: 
            <select name="sexo" required>
                <option value="">Seleccione</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select><br>
            Dirección: <input type="text" name="direccion" required><br>
            Teléfono: <input type="tel" name="telefono" required><br>
            Correo: <input type="email" name="correo" required><br>
            Motivo de consulta: <textarea name="motivo" required></textarea><br>
            <input type="submit" name="registro_paciente" value="Registrar Paciente">
        </form>

        <!-- Formulario de acceso administrativo -->
        <form method="POST" action="">
            <h3>ACCESO ADMINISTRATIVO</h3>
             <strong>USUARIO</strong><br> (máx 10 caracteres, mayúsculas): <input type="text" name="usuario" maxlength="10" pattern="[A-Z]{1,10}" required><br>
            <strong>CLAVE</strong><br> (mín 8 caracteres, minúsculas): <input type="password" name="clave" minlength="8" pattern="[a-z]{8,}" required><br>
            <input type="submit" name="login" value="Ingresar">
        </form>
    </div>

    <?php
    // Incluir el archivo PHP con la lógica
    include 'tarea7ejbase.php';
    ?>
</body>
</html>