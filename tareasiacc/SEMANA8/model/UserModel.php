<?php
class UserModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Registrar nuevo usuario con contraseña hasheada
    public function registrarUsuario($username, $password, $rol = 'empleado') {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (username, password, rol) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('sss', $username, $hash, $rol);
        return $stmt->execute();
    }

    // Buscar usuario por username
    public function obtenerUsuarioPorUsername($username) {
        $sql = "SELECT * FROM usuarios WHERE username = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
}
?>
