<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pacientes y Acceso Administrativo</title>
    <style>
        /* Estilo para la imagen de fondo */
        body {
            background-image: url('traumatologia-1.jpg'); /* Cambia 'traumatologia.jpg' por la ruta de tu imagen */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Estilo para centrar el formulario */
        form {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semitransparente */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 50px auto; /* Centrar el formulario */
            text-align: center; /* Centrar el contenido del formulario */
        }

        h1 {
            text-align: center;
            color: #333;
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
    <h1>Gestión de Pacientes y Acceso Administrativo</h1>

    <?php
    // Incluir el archivo PHP con la lógica
    include 'tarea7ejbase.php';
    ?>
</body>
</html>