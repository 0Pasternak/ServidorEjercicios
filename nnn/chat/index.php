<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <style>
        @media only screen and (max-width: 600px) {
        body{
            margin: 40px
        }
        }
    </style>
</head>
<body>
    <h1>Registro de Usuarios</h1>
    <form method="post" action="">
        <label for="nombre">Nombre de usuario:</label>
        <input type="text" name="nombre" required placeholder="nombre"><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required placeholder="contraseña"><br>

        <input type="submit" value="Registrar">
    </form>
    <a href="iniciarsesion.php">iniciar sesion</a>
    
</body>
</html>

<?php
$archivo = 'usuarios.csv';
function usuarioExiste($nombreUsuario, $archivo){
    $filas = file($archivo);
    foreach ($filas as $fila) {
        list($nombre) = explode(';', $fila);
        if ($nombre == $nombreUsuario) {
            return true;
        }
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombreUsuario = $_POST['nombre'];
    $password = $_POST['password'];

    if (usuarioExiste($nombreUsuario, $archivo)) {
        echo "El usuario existe";
    } else {
        $file = fopen($archivo, 'a');

        if ($file) {
            $data = [$nombreUsuario, $password];
            fputcsv($file, $data, ';');
            fclose($file);
            echo "Usuario registrado";
        } else {
            echo 'Error';
        }
    }
}
?>