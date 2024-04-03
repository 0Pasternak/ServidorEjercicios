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
        /* Estilos para el formulario de inserción de alumnos */
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
    </style>
</head>

<body>
    <form action="guardar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required placeholder="nombre"><br><br>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" required placeholder="precio"><br><br>
        <label for="imagen" placeholder="ruta imagen">Imagen:</label>
        <input type="text" name="imagen" required><br><br>
        <input type="submit" value="Guardar">
    </form>

</body>

</html>