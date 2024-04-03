<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            padding: 8px 20px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
        }
        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "alumnos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener nombre desde la URL
$nombre = $_GET['nombre2'];

// Consulta para buscar el alumno por nombre
$sql = "SELECT * FROM alumnos WHERE nombre = '$nombre'";
$result = $conn->query($sql);

echo "<h2>Alumno encontrado</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Apellido</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td></tr>";
    }
    echo "</table>";
    echo "<a href='index.php'>Agregar Alumno</a><br>";
} else {
    echo "No se encontró ningún alumno con ese nombre";
}

$conn->close();
?>
    
</body>
</html>
