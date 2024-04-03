<?php
// Lee la configuración desde config.ini
$config = @parse_ini_file('config.ini', true);

// Verificar si la lectura del archivo fue exitosa
if ($config === false) {
    die("Error al leer el archivo de configuración");
}

$servername = $config['database']['servername'] ?? '';
$username = $config['database']['username'] ?? '';
$password = $config['database']['password'] ?? '';
$dbname = $config['database']['dbname'] ?? '';

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
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

