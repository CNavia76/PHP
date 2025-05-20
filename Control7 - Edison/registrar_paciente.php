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