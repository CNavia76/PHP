<?php
require_once __DIR__ . '/../lib/csrf.php';
$token = generarTokenCSRF();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="../index.php?action=login" method="POST">
        <input type="hidden" name="csrf_token" value="<?= $token ?>">
        <label>Usuario:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Entrar">
    </form>
    <a href="../index.php?action=registro_usuario">Registrarse</a>
</body>
</html>
