<?php

// Función para limpiar entradas y evitar inyección y errores
function limpiar_dato($dato) {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

// Conexión a la base de datos databasetrauma para pacientes
$host = "localhost";
$user = "root";
$password = ""; // Cambia si tienes contraseña
$database_pacientes = "databasetrauma";

// Conexión para pacientes
$conexion = new mysqli($host, $user, $password, $database_pacientes);

// Verificar conexión de pacientes
if ($conexion->connect_error) {
    die("Error de conexión (pacientes): " . $conexion->connect_error);
}

// Variables para mensajes
$mensaje_exito = "";
$mensaje_admin = "";
$color_admin = "success"; // Bootstrap usa 'success' para verde y 'danger' para rojo

// Procesar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Procesar datos del formulario de pacientes
    if (isset($_POST['registro_paciente'])) {
        $nombre = limpiar_dato($_POST['nombre']);
        $apellido = limpiar_dato($_POST['apellido']);
        $identificacion = limpiar_dato($_POST['identificacion']);
        $sexo = limpiar_dato($_POST['sexo']);
        $direccion = limpiar_dato($_POST['direccion']);
        $telefono = limpiar_dato($_POST['telefono']);
        $correo = limpiar_dato($_POST['correo']);
        $motivo = limpiar_dato($_POST['motivo']);

        $stmt = $conexion->prepare("INSERT INTO pacientes (nombre, apellido, identificacion, sexo, direccion, telefono, correo, motivo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nombre, $apellido, $identificacion, $sexo, $direccion, $telefono, $correo, $motivo);

        if ($stmt->execute()) {
            $mensaje_exito = "Paciente ingresado con éxito";
        } else {
            $mensaje_exito = "Error al registrar paciente" . $stmt->error;
        }
        $stmt->close();
    }

    // Procesar datos del formulario de acceso administrativo
    if (isset($_POST['login'])) {
        // Cambiar conexión a la base de datos databasetrauma y tabla usuarios_clinica
        $conexion_admin = new mysqli($host, $user, $password, $database_pacientes);

        if ($conexion_admin->connect_error) {
            $mensaje_admin = "Error de conexión (admin): " . $conexion_admin->connect_error;
            $color_admin = "danger";
        } else {
            $usuario = limpiar_dato($_POST['usuario']);
            $clave = limpiar_dato($_POST['clave']);

            if (strlen($usuario) <= 10 && strtoupper($usuario) === $usuario) {
                if (strlen($clave) >= 8 && strtolower($clave) === $clave) {
                    // Cambiar consulta a la tabla usuarios_clinica
                    $stmt = $conexion_admin->prepare("SELECT * FROM usuarios_clinica WHERE usuario = ? AND clave = ?");
                    $stmt->bind_param("ss", $usuario, $clave);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $mensaje_admin = "Acceso concedido a $usuario";
                        $color_admin = "success";
                    } else {
                        $mensaje_admin = "Usuario o clave incorrectos.";
                        $color_admin = "danger";
                    }
                    $stmt->close();
                } else {
                    $mensaje_admin = "Clave inválida: debe tener mínimo 8 caracteres y estar en minúsculas.";
                    $color_admin = "danger";
                }
            } else {
                $mensaje_admin = "Usuario inválido: máximo 10 caracteres y en mayúsculas.";
                $color_admin = "danger";
            }
            $conexion_admin->close();
        }
    }
}
$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLÍNICA TRAUMATOLÓGICA "EL BIENESTAR"</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('traumatologia-1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-light">
    <header class="bg-info py-4 mb-4" style="background-color: rgba(13,202,240,0.3) !important;">
        <div class="container text-center">
            <h1 class="display-4" style="color: hsla(209, 67.10%, 85.70%, 0.80);">CLÍNICA TRAUMATOLÓGICA "EL BIENESTAR"</h1>
            <h3 class="text-secondary">Gestión de Pacientes y Acceso Administrativo</h3>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <!-- Formulario de registro de pacientes -->
            <div class="col-md-5">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        REGISTRO DE PACIENTES
                    </div>
                    <div class="card-body">
                        <?php if (!empty($mensaje_exito)) { ?>
                            <div class="alert alert-<?php echo ($mensaje_exito == "Paciente ingresado con éxito") ? 'success' : 'danger'; ?>" role="alert">
                                <?php echo $mensaje_exito; ?>
                            </div>
                        <?php } ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apellido</label>
                                <input type="text" name="apellido" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Identificación</label>
                                <input type="text" name="identificacion" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sexo</label>
                                <select name="sexo" class="form-select" required>
                                    <option value="">Seleccione</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dirección</label>
                                <input type="text" name="direccion" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="tel" name="telefono" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Correo</label>
                                <input type="email" name="correo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Motivo de consulta</label>
                                <textarea name="motivo" class="form-control" required></textarea>
                            </div>
                            <button type="submit" name="registro_paciente" class="btn btn-primary w-100">Registrar Paciente</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Formulario de acceso administrativo -->
            <div class="col-md-5">
                <div class="card shadow mb-4">
                    <div class="card-header bg-secondary text-white">
                        ACCESO ADMINISTRATIVO
                    </div>
                    <div class="card-body">
                        <?php if (!empty($mensaje_admin)) { ?>
                            <div class="alert alert-<?php echo $color_admin; ?>" role="alert">
                                <?php echo $mensaje_admin; ?>
                            </div>
                        <?php } ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">Usuario (máx 10 caracteres, mayúsculas)</label>
                                <input type="text" name="usuario" maxlength="10" pattern="[A-Z]{1,10}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Clave (mín 8 caracteres, minúsculas)</label>
                                <input type="password" name="clave" minlength="8" pattern="[a-z]{8,}" class="form-control" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-secondary w-100">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
