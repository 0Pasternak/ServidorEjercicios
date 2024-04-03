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

// Consultar las categorías
$result = $conn->query("SELECT DISTINCT categoria FROM tu_tabla");

$categorias = array();
if ($result->num_rows > 0) {
    // Guardar cada fila en el array
    while($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
    // Devolver resultados como JSON
    echo json_encode($categorias);
} else {
    echo json_encode([]);
}

// Cerrar conexión
$conn->close();
?>
