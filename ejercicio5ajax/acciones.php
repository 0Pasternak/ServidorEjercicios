<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alimentacion";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


if (isset($_POST['eliminar_cuenta'])) {
    $corr = $_SESSION['correo_usuario']; 
    $sql = "DELETE FROM datos WHERE correo = '$corr'";
    
    if ($conn->query($sql) === TRUE) {
        session_unset();
        session_destroy();
        header("Location: index.html");
        exit();
    } else {
        echo "Error al eliminar cuenta: " . $conn->error;
    }
}

if (isset($_POST['editar_datos'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['email'];
    $corr = $_SESSION['correo'];

    $sql = "UPDATE datos SET nomape = '$nombre', correo ='$correo' WHERE correo = '$corr'";

    
    if ($conn->query($sql) === TRUE) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar datos: " . $conn->error;
    }
}

$conn->close();
?>
