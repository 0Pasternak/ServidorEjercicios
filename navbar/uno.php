<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$dbname = "nombre_de_tu_base_de_datos";
$username = "nombre_de_usuario";
$password = "contraseña";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recuperar valores del formulario
$categoria = $_POST['categoria'];
$valor = $_POST['valor'];

// Preparar y vincular parámetros
$stmt = $conn->prepare("INSERT INTO tu_tabla (categoria, valor) VALUES (?, ?)");
$stmt->bind_param("ss", $categoria, $valor);

// Ejecutar y verificar
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexiones
$stmt->close();
$conn->close();
?>
