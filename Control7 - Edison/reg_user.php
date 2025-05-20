<?php
// Clase de conexión reutilizable
class ConexionBD {
    private $conect_system;

    public function __construct() {
        $this->conect_system = new mysqli("localhost", "root", "", "clinica_bienestar");
        if ($this->conect_system->connect_error) {
            die("Conexión fallida: " . $this->conect_system->connect_error);
        }
    }

    public function insertarUsuario($usuario, $contrasena) {
        $usuario = strtoupper($usuario); // Validar que sea en mayúsculas
        $contrasena = strtolower($contrasena);     // Validar que sea en minúsculas
        if (strlen($contrasena) < 8) return false;

        $stmt = $this->conect_system->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
        $stmt->bind_param("ss", $usuario, $contrasena);
        return $stmt->execute();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $bd = new ConexionBD();
    if ($bd->insertarUsuario($usuario, $contrasena)) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error en el registro. Verifique los requisitos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario Traumatologia</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="reg_user.php" method="POST">
        Usuario (MÁX 10 caracteres): <input type="text" name="usuario" maxlength="10" required><br>
        Contraseña (mín. 8 minúsculas): <input type="password" name="contrasena" minlength="8" required><br>
        <button type="submit">Registrar Usuario</button>
    </form>
</body>
</html>

