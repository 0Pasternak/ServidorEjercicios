<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Lista de Productos</h1>
    <ul>
        <?php
        include 'db.php';

        $sql = "SELECT id, nombre FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<li><a href="detalle.php?id=' . $row['id'] . '">' . $row['nombre'] . '</a></li>';
            }
        } else {
            echo '<li>No hay productos disponibles.</li>';
        }

        $conn->close();
        ?>
    </ul>
</body>
</html>
