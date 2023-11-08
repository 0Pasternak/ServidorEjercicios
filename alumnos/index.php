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
            margin-bottom: 10px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            padding: 8px;
            margin-bottom: 10px;
            width: 300px;
        }
        input[type="submit"] {
            padding: 8px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #3498db;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h2>Insertar Alumno</h2>
    <form action="guardar_alumnos.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br><br>
        <input type="submit" value="Guardar">
    </form>
    <h2>Buscar Alumno por Nombre</h2>
    <form action="mostrar_alumno.php" method="get">
        <label for="nombre2">Nombre:</label>
        <input type="text" name="nombre2" required id="nombre2"><br><br>
        <input type="submit" value="Buscar">
    </form>
    <?php

include 'conexion.php'; // Incluir el archivo de conexión

// Consulta para obtener todos los alumnos
$sql = "SELECT * FROM alumnos";
$result = $conn->query($sql);

echo "<h2>Lista de Alumnos</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Apellido</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td></tr>";
    }
    echo "</table>";
    echo "<a href='index.php'>Agregar Alumno</a><br>";
    echo "<a href='index.php'>Buscar Alumno</a>";
} else {
    echo "No se encontraron alumnos";
}

$conn->close();
?>
    
</body>
</html>
