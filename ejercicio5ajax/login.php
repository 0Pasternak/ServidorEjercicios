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


$sql = "SELECT * FROM datos WHERE correo = '$email' AND contrasena = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $nombre_usuario = $row['nomape']; 
    $correo_usuario = $row['correo']; 


    session_start();
    $_SESSION['nombre_usuario'] = $nombre_usuario;
    $_SESSION['correo_usuario'] = $correo_usuario; 

    echo 'success';
} else {
    echo 'Correo o contraseña incorrectos.';
}

$conn->close();
?>
