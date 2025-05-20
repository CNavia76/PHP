<?php
$conect_system = new mysqli("localhost", "root", "", "clinica_bienestar");

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
if (isset($_POST['iniciar_sesion'])){


if (strlen($usuario) <= 10 && strtoupper($usuario) === $usuario) {
    if (strlen($contrasena) >= 8 && strtolower($contrasena) === $contrasena) {
        // Código dentro de ambas condiciones
    }
}
                    // Cambiar consulta a la tabla usuarios
                    $stmt = $conect_system->prepare("SELECT * FROM usuario WHERE usuario = ? AND contrasena = ?");
                    $stmt->bind_param("ss", $usuario, $contrasena);
                    $stmt->execute();
                    $result = $stmt->get_result();

                
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$contrasena'";
$result = $conect_system->query($sql);

if ($result->num_rows > 0){
    echo "Bienvenido a Clinica Bienestar";
} else {
    echo "Usuario o contraseña incorrectos. Reintente";
}
$conect_system->close();
}
?>