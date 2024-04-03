<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            height: 100px;
            width: 100px;
        }
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

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        #inicio {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            padding: 8px 20px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
        }

        #inicio:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <?php
    include 'conexion.php';

    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    echo "<h2>Lista de Productos</h2>";
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>imagen</th></tr>";
        while ($row = $result->fetch_assoc()) {

            echo "<tr><td>" . $row["id"] . "</td><td> <a href='producto.php'>" . $row["nombre"] . "</a></td><td>" . $row["precio"] . "</td><td><img src=" . $row["imagen"] . " /></td></tr>";
        }
        echo "</table>";
        echo "<a href='login.php' id='inicio'>Iniciar sesion como administrador</a><br>";
    } else {
        echo "No se encontraron productos";
    }

    $conn->close();
    ?>


</body>

</html>