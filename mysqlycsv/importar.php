<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "alumnos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para seleccionar los datos de la tabla 'alumnos'
$sql = "SELECT * FROM alumnos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Nombre del archivo CSV que se va a generar
    $file = 'alumnos_exportados.csv';

    // Abre el archivo CSV en modo escritura
    $fp = fopen($file, 'w');


    // Recorre los resultados de la consulta y escribe cada fila en el archivo CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }

    // Cierra el archivo CSV
    fclose($fp);

    echo "Datos exportados correctamente a $file";
} else {
    echo "No se encontraron datos para exportar";
}

// Cierra la conexión a la base de datos
$conn->close();
?>