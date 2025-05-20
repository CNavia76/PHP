<?php
//conexion a BDD
$conect_system=new mysqli("localhost", "root", "", "clinica_bienestar");

//condicional fallo en conexion.
if ($conect_system->connect_error) {
    die("Fallo al conectar: " . $conect_system->connect_error);
}

//entrada de datos del paciente a registrar en formulario.
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$identificacion=$_POST['identificacion'];
$sexo=$_POST['sexo'];
$direccion=$_POST['direccion'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$motivo=$_POST['motivo'];

//Insert Data.
$sql = "INSERT INTO data_client (nombre, apellido, identificacion, sexo, direccion, correo, telefono, motivo)
        VALUES ('$nombre', '$apellido', '$identificacion', '$sexo', '$direccion', '$correo', '$telefono', '$motivo')";
// la comilla simple sirve para el id auto incrementable
if ($conect_system->query($sql) === true) {
    echo "Paciente registrado con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conect_system->error;
}

$conect_system->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="registrar_paciente.php" method="POST">
    Nombre Paciente: <input type="text" name="nombre" required><br>
    Apellido Paciente: ><input type="text" name="apellido" required><br>
    Rut: <input type="text" name="identificacion" required><br>
    Sexo:
    <select name="sexo">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select><br>
    Dirección: <input type="text" name="direccion"><br>
    Teléfono: <input type="text" name="telefono"><br>
    e-mail: <input type="email" name="correo"><br>
    Motivo de consulta: <textarea name="motivo"></textarea><br>
    <input type="submit" value="registrar">
</form> 
</body>
</html>