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
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->conexion->error);
        }
        $stmt->bind_param('sss', $username, $hash, $rol);
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
        // Removed redundant code
    }
}
?>
