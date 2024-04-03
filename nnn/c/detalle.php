<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    include 'db.php';

    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];

        $sql = "SELECT * FROM productos WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<h1>' . $row['nombre'] . '</h1>';
            echo '<img src="../images/' . $row['imagen'] . '" alt="' . $row['nombre'] . '">';
            echo '<p>' . $row['descripcion'] . '</p>';
        } else {
            echo '<p>Producto no encontrado.</p>';
        }
    } else {
        echo '<p>ID de producto no proporcionado.</p>';
    }

    $conn->close();
    ?>
</body>
</html>
