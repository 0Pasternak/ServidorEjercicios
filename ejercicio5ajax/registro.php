<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alimentacion";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$email = $_POST['email'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$sexo = $_POST['sexo'];
$fechaNacimiento = $_POST['fechaNacimiento'];


$sql = "INSERT INTO datos (correo, contrasena, nomape, sexo, fecha, ccid) VALUES ('$email', '$password', '$nombre', '$sexo', '$fechaNacimiento', 0)";

if ($conn->query($sql) === TRUE) {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error al registrar usuario: " . $conn->error;
}

$conn->close();
?>
