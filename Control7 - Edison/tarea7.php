<?php

session_start();

// Clase de conexión reutilizable
class ConexionBD {
    private $conect_system;

    public function __construct() {
        $this->conect_system = new mysqli("localhost", "root", "", "clinica_bienestar");
        if ($this->conect_system->connect_error) {
            die("Conexión fallida: " . $this->conect_system->connect_error);
        }
    }

    public function getConexion() {
        return $this->conect_system;
    }

    public function cerrar() {
        $this->conect_system->close();
    }
}

// Registro de usuario
$mensaje_registro = "";
if (isset($_POST["registrar_usuario"])) {
    $usuario = strtoupper($_POST["usuario"]);
    $contrasena = strtolower($_POST["contrasena"]);
    if (strlen($usuario) <= 10 && strlen($contrasena) >= 8) {
        $bd = new ConexionBD();
        $stmt = $bd->getConexion()->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
        $stmt->bind_param("ss", $usuario, $contrasena);
        if ($stmt->execute()) {
            $mensaje_registro = "Usuario registrado correctamente.";
        } else {
            $mensaje_registro = "Error en el registro. Verifique los requisitos.";
        }
        $bd->cerrar();
    } else {
        $mensaje_registro = "Usuario o contraseña no cumplen los requisitos.";
    }
}

// Login de usuario
$mensaje_login = "";
if (isset($_POST["iniciar_sesion"])) {
    $usuario = strtoupper($_POST["usuario"]);
    $contrasena = strtolower($_POST["contrasena"]);
    if (strlen($usuario) <= 10 && strlen($contrasena) >= 8) {
        $bd = new ConexionBD();
        $stmt = $bd->getConexion()->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
        $stmt->bind_param("ss", $usuario, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $_SESSION["usuario"] = $usuario;
            $mensaje_login = "Bienvenido a Clinica Bienestar";
        } else {
            $mensaje_login = "Usuario o contraseña incorrectos. Reintente";
        }
        $bd->cerrar();
    } else {
        $mensaje_login = "Usuario o contraseña no cumplen los requisitos.";
    }
}

// Registro de paciente (solo si hay sesión iniciada)
$mensaje_paciente = "";
if (isset($_POST["registrar_paciente"]) && isset($_SESSION["usuario"])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $identificacion = $_POST['identificacion'];
    $sexo = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $motivo = $_POST['motivo'];

    $bd = new ConexionBD();
    $stmt = $bd->getConexion()->prepare(
        "INSERT INTO data_client (nombre, apellido, identificacion, sexo, direccion, correo, telefono, motivo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("ssssssss", $nombre, $apellido, $identificacion, $sexo, $direccion, $correo, $telefono, $motivo);
    if ($stmt->execute()) {
        $mensaje_paciente = "Paciente registrado con éxito.";
    } else {
        $mensaje_paciente = "Error al registrar paciente.";
    }
    $bd->cerrar();
}

// Cerrar sesión
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: tarea7.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clínica Bienestar - Sistema Unificado</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .tabs { margin-bottom: 20px; }
        .tab { display: inline-block; margin-right: 10px; }
        .active { font-weight: bold; }
        .msg { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Clínica Bienestar</h1>
    <div class="tabs">
        <a class="tab <?php if(!isset($_GET['tab']) || $_GET['tab']=='login') echo 'active'; ?>" href="?tab=login">Iniciar Sesión</a>
        <a class="tab <?php if(isset($_GET['tab']) && $_GET['tab']=='registro') echo 'active'; ?>" href="?tab=registro">Registrar Usuario</a>
        <?php if (isset($_SESSION["usuario"])): ?>
            <a class="tab <?php if(isset($_GET['tab']) && $_GET['tab']=='paciente') echo 'active'; ?>" href="?tab=paciente">Registrar Paciente</a>
            <a class="tab" href="?logout=1">Cerrar Sesión (<?php echo $_SESSION["usuario"]; ?>)</a>
        <?php endif; ?>
    </div>

    <?php
    $tab = isset($_GET['tab']) ? $_GET['tab'] : 'login';

    if ($tab == 'registro') {
    ?>
        <h2>Registro de Usuario</h2>
        <?php if ($mensaje_registro) echo "<div class='msg'>$mensaje_registro</div>"; ?>
        <form action="tarea7.php?tab=registro" method="POST">
            Usuario (MÁX 10 caracteres, solo mayúsculas): <input type="text" name="usuario" maxlength="10" required><br>
            Contraseña (mín. 8 minúsculas): <input type="password" name="contrasena" minlength="8" required><br>
            <button type="submit" name="registrar_usuario">Registrar Usuario</button>
        </form>
    <?php
    } elseif ($tab == 'paciente' && isset($_SESSION["usuario"])) {
    ?>
        <h2>Registro de Paciente</h2>
        <?php if ($mensaje_paciente) echo "<div class='msg'>$mensaje_paciente</div>"; ?>
        <form action="tarea7.php?tab=paciente" method="POST">
            Nombre Paciente: <input type="text" name="nombre" required><br>
            Apellido Paciente: <input type="text" name="apellido" required><br>
            Rut: <input type="text" name="identificacion" required><br>
            Sexo:
            <select name="sexo">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select><br>
            Dirección: <input type="text" name="direccion"><br>
            Teléfono: <input type="text" name="telefono"><br>
            e-mail: <input type="email" name="correo"><br>
            Motivo de consulta: <textarea name="motivo"></textarea><br>
            <input type="submit" name="registrar_paciente" value="Registrar">
        </form>
    <?php
    } else {
    ?>
        <h2>Iniciar Sesión</h2>
        <?php if ($mensaje_login) echo "<div class='msg'>$mensaje_login</div>"; ?>
        <form action="app_unificado.php?tab=login" method="POST">
            Usuario: <input type="text" name="usuario" maxlength="10" required><br>
            Contraseña: <input type="password" name="contrasena" minlength="8" maxlength="250" required><br>
            <input type="submit" name="iniciar_sesion" value="Iniciar Sesión">
        </form>
    <?php
    }
    ?>
</body>
</html>