<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "alumnos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Ruta al archivo CSV
$ruta_csv = 'alumnos_exportados.csv';

// Vaciar la tabla antes de insertar nuevos datos
$sql_truncate = "TRUNCATE TABLE alumnos";
if ($conn->query($sql_truncate) === TRUE) {
    echo "Tabla vaciada correctamente<br>";
} else {
    echo "Error al vaciar la tabla: " . $conn->error;
}

// Abrir el archivo CSV
$file = fopen($ruta_csv, "r");

// Recorrer el archivo y realizar la inserción en la base de datos
while (($data = fgetcsv($file)) !== FALSE) {
    $id = isset($data[0]) ? $data[0] : null;
    $nombre = isset($data[1]) ? $data[1] : null;
    $apellido = isset($data[2]) ? $data[2] : null;

    // Verificar que los valores no son nulos antes de la inserción
    if ($id !== null && $nombre !== null && $apellido !== null) {
        // Crear la consulta para insertar los datos
        $sql = "INSERT INTO alumnos (id, nombre, apellido) VALUES ('$id', '$nombre', '$apellido')";

        // Ejecutar la consulta
        if ($conn->query($sql) !== TRUE) {
            echo "Error al insertar datos: " . $conn->error;
        }
    }
}

// Cerrar la conexión y el archivo CSV
fclose($file);
$conn->close();
?>
