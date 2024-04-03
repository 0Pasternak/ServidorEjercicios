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

// Obtener el usuario y la contraseña desde MySQL
$sql = "SELECT id, username, password FROM usuarios WHERE id = 1"; // Reemplaza 1 con el ID del usuario que deseas actualizar
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Hashear la contraseña
    $hashedPassword = password_hash($row['password'], PASSWORD_DEFAULT);

    // Actualizar la contraseña hasheada en MySQL
    $updateSql = "UPDATE usuarios SET password = '$hashedPassword' WHERE id = " . $row['id'];
    if ($conn->query($updateSql) === TRUE) {
        echo "Contraseña actualizada y hasheada correctamente.";
    } else {
        echo "Error al actualizar la contraseña: " . $conn->error;
    }
} else {
    echo "No se encontró ningún usuario.";
}

// Cerrar la conexión
$conn->close();

?>
