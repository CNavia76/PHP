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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
    Usuario: <input type="text" name="usuario" maxlength="10" required><br>
    Contraseña: <input type="password" name="contraseña" minlength="8" maxlength="250"><br>
    <input type="submit" value="Iniciar_sesion">
</form>
</body>
</html>
