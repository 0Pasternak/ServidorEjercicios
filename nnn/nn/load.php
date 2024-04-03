<?php

// Conexión a MySQL
$servername = "localhost";
$username_mysql = "tu_usuario_mysql";
$password_mysql = "tu_contraseña_mysql";
$dbname_mysql = "tu_base_de_datos_mysql";

$conn = new mysqli($servername, $username_mysql, $password_mysql, $dbname_mysql);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el usuario y la contraseña proporcionados por el formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consultar la base de datos para el usuario ingresado
$sql = "SELECT id, username, password FROM usuarios WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verificar la contraseña usando password_verify
    if (password_verify($password, $row['password'])) {
        // Contraseña válida, iniciar sesión o realizar otras acciones necesarias
        echo "Inicio de sesión exitoso!";
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta.";
    }
} else {
    // Usuario no encontrado
    echo "Usuario no encontrado.";
}

// Cerrar la conexión
$conn->close();

?>
