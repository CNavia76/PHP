<?php
require_once __DIR__ . '/../lib/csrf.php';
$token = generarTokenCSRF();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form action="../index.php?action=registro_usuario" method="POST">
        <input type="hidden" name="csrf_token" value="<?= $token ?>">
        <label>Usuario:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirmar Contraseña:</label><br>
        <input type="password" name="password_confirm" required><br><br>

        <input type="submit" value="Registrar">
    </form>
    <a href="../index.php?action=login">Iniciar Sesión</a>
</body>
</html>
