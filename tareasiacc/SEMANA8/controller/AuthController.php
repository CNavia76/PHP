<?php
require_once __DIR__ . '/../model/UserModel.php';

class AuthController {
    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new UserModel($conexion);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Registro de usuario con validación básica
    public function registrar($username, $password, $passwordConfirm) {
        $username = trim($username);
        if (empty($username) || empty($password)) {
            return ['success' => false, 'mensaje' => 'Usuario y contraseña son obligatorios'];
        }
        if ($password !== $passwordConfirm) {
            return ['success' => false, 'mensaje' => 'Las contraseñas no coinciden'];
        }
        if ($this->modelo->obtenerUsuarioPorUsername($username)) {
            return ['success' => false, 'mensaje' => 'El usuario ya existe'];
        }
        $exito = $this->modelo->registrarUsuario($username, $password);
        return $exito ? ['success' => true] : ['success' => false, 'mensaje' => 'Error al registrar usuario'];
    }

    // Login de usuario
    public function login($username, $password) {
        $username = trim($username);
        if (empty($username) || empty($password)) {
            return ['success' => false, 'mensaje' => 'Usuario y contraseña son obligatorios'];
        }
        $usuario = $this->modelo->obtenerUsuarioPorUsername($username);
        if ($usuario && password_verify($password, $usuario['password'])) {
            // Guardar datos en sesión
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['username'] = $usuario['username'];
            $_SESSION['rol'] = $usuario['rol'];
            return ['success' => true];
        }
        return ['success' => false, 'mensaje' => 'Usuario o contraseña incorrectos'];
    }

    // Verifica si usuario está autenticado
    public function estaAutenticado() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }

    // Cerrar sesión
    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
    }
}

// (Assuming your UserModel class looks like this)
class UserModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Busca un usuario por su nombre de usuario
    public function obtenerUsuarioPorUsername($username) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    // Other methods...
}
?>
