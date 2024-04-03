<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
        input[type="password"] {
            padding: 8px;
            margin-bottom: 10px;
            width: 300px;
        }
    </style>
    </style>
</head>
<body>
<h1>Iniciar Sesión</h1>
    <form action="inicio.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required placeholder="usuario"><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required placeholder="contraseña"><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    
</body>
</html>