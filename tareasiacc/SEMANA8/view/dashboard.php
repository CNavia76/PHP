<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php?action=login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, <?= htmlspecialchars($_SESSION['username']) ?></h1>
    <p>Rol: <?= htmlspecialchars($_SESSION['rol']) ?></p>

    <a href="../index.php?action=logout">Cerrar Sesión</a>
    <br><br>
    <a href="../index.php?action=registro">Registrar Asistencia</a> |
    <a href="../index.php?action=listar">Ver Asistencia</a>
</body>
</html>
