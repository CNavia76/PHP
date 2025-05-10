<?php
// Verifica si la clave 'REQUEST_METHOD' existe en $_SERVER y si el formulario fue enviado
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar datos del formulario de pacientes
    if (isset($_POST['registro_paciente'])) {
        // Captura y sanitiza los datos
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);
        $identificacion = htmlspecialchars($_POST['identificacion']);
        $sexo = htmlspecialchars($_POST['sexo']);
        $direccion = htmlspecialchars($_POST['direccion']);
        $telefono = htmlspecialchars($_POST['telefono']);
        $correo = htmlspecialchars($_POST['correo']);
        $motivo = htmlspecialchars($_POST['motivo']);

        // Aquí se puede agregar código para guardar en base de datos

        echo "Paciente registrado: $nombre $apellido";
    }

    // Procesar datos del formulario de acceso administrativo
    if (isset($_POST['login'])) {
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        // Validar usuario: máximo 10 caracteres, mayúsculas
        if (strlen($usuario) <= 10 && strtoupper($usuario) === $usuario) {
            // Validar clave: mínimo 8 caracteres, minúsculas
            if (strlen($clave) >= 8 && strtolower($clave) === $clave) {
                // Aquí validar credenciales contra base de datos
                echo "Acceso concedido a $usuario";
            } else {
                echo "Clave inválida: debe tener mínimo 8 caracteres y estar en minúsculas.";
            }
        } else {
            echo "Usuario inválido: máximo 10 caracteres y en mayúsculas.";
        }
    }
}
?>

<!-- Formulario de registro de pacientes -->
<form method="POST" action="">
    <h3>REGISTRO DE PACIENTES</h3>
    Nombre: <input type="text" name="nombre" required><br>
    Apellido: <input type="text" name="apellido" required><br>
    Identificación: <input type="text" name="identificacion" required><br>
    Sexo: 
    <select name="sexo" required>
        <option value="">Seleccione</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select><br>
    Dirección: <input type="text" name="direccion" required><br>
    Teléfono: <input type="tel" name="telefono" required><br>
    Correo: <input type="email" name="correo" required><br>
    Motivo de consulta: <textarea name="motivo" required></textarea><br>
    <input type="submit" name="registro_paciente" value="Registrar Paciente">
</form>

<!-- Formulario de acceso administrativo -->
<form method="POST" action="">
    <h3>ACCESO ADMINISTRATIVO</h3>
    Usuario (máx 10 caracteres, mayúsculas): <input type="text" name="usuario" maxlength="10" pattern="[A-Z]{1,10}" required><br>
    Clave (mín 8 caracteres, minúsculas): <input type="password" name="clave" minlength="8" pattern="[a-z]{8,}" required><br>
    <input type="submit" name="login" value="Ingresar">
</form>
