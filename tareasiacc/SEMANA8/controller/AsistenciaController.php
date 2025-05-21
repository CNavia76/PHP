
<?php
class AsistenciaController {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregar($idEmpleado, $nombre, $apellido, $entrada, $salida) {
        // Implementar lógica para agregar asistencia
        // Ejemplo básico:
        $stmt = $this->conexion->prepare("INSERT INTO asistencia (idEmpleado, nombre, apellido, entrada, salida) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$idEmpleado, $nombre, $apellido, $entrada, $salida]);
    }

    public function listar() {
        $stmt = $this->conexion->query("SELECT * FROM asistencia");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM asistencia WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>