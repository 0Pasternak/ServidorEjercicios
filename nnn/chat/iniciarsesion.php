<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
        $usuarios = array_map('str_getcsv', file('usuarios.csv'));
        foreach ($usuarios as $fila) {
            $usuarioDatos = explode(';', $fila[0]);
            if ($usuarioDatos[0] == $usuario && $usuarioDatos[1] == $password) {
                $_SESSION['usuario'] = $usuario;
                header("Location: micuenta.php");
                exit();
            }
        }
        echo "Usuario o contraseña incorrectos";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @media only screen and (max-width: 600px) {
        body{
            margin: 40px
        }
        }
    </style>

</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required placeholder="usuario"><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required placeholder="contraseña"><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
