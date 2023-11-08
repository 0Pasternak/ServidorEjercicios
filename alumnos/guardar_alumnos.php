<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Conexión a la base de datos
include 'conexion.php';

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

// Insertar datos en la base de datos
$sql = "INSERT INTO alumnos (nombre, apellido) VALUES ('$nombre', '$apellido')";

if (mysqli_query($conn, $sql)) {
    echo "Alumno guardado correctamente. Redireccionando a la lista de alumnos...";
    header('Location: listar_alumnos.php'); // Redirecciona a la página de listar alumnos
    exit();
} else {
    echo "Error al guardar el alumno: " . mysqli_error($conn);
}

mysqli_close($conn); // Cierra la conexión a la base de datos

?>

    
</body>
</html>