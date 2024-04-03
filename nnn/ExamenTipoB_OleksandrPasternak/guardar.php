<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $sql = "INSERT INTO productos (nombre, precio, imagen) VALUES ('$nombre', '$precio', '$imagen')";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error al guardar el producto: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    ?>

</body>

</html>