<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carnet24";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nombre = $_POST['nombre'];
$nif = $_POST['nif'];
$clave = $_POST['clave'];
$anoNacimiento = $_POST['anoNacimiento'];


$sql = "INSERT INTO usuarioscj24 (nif, codigoacceso, nombreapellidos, annonacimiento) VALUES ('$nif', '$clave','$nombre','$anoNacimiento')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

$conn->close();
?>