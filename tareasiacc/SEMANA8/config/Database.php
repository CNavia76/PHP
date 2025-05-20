<?php


class Database {
    private $host = 'localhost';
    private $usuario = 'root'; // Cambia si tu usuario es diferente
    private $clave = '';       // Cambia si tienes contraseña
    private $db = 'database_xyz';
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db);

        if ($this->conexion->connect_error) {
            die('Error de conexión: ' . $this->conexion->connect_error);
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
}
?>