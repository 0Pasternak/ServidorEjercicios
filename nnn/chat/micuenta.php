<?php
session_start();

function ActualizarChat() {
    $archivo = 'chat.csv';
        echo "<table style='width: 200px;'>";
        if (($leer = fopen($archivo, 'r')) !== false) {
            while (($fila = fgetcsv($leer, null, ';')) !== false) {
                if (count($fila) >= 2) {
                    echo "<tr>";
                    
                        echo "<td>" . $fila[0] . ": " . "</td>" . "<td>" . $fila[2] . "</td>";
                    
                    echo "</tr>";
                } else {
                    
                }
            }
            fclose($leer);
        } else {
            echo "No se pudo abrir el archivo.";
        }
        echo "</table>";

        
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = date('Y-m-d H:i:s');
    $mensaje = $_POST['mensaje'];
    $file = fopen("chat.csv", "a");

    if ($file) {
        
        $data = [$_SESSION['usuario'], $fecha, $mensaje];
        fputcsv($file, $data, ';');

        fclose($file);
        // header("Location: micuenta.php");
        
        exit;
    } else {
        echo 'No se pudo abrir el archivo de contactos para escritura.';
    }
}
ActualizarChat();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>
    <a href="cerrar.php">Cerrar sesión</a>

        <form method="post">
            <textarea name="mensaje" id="mensaje" cols="30" rows="3"></textarea>
            <input type="submit">
        </form>
</body>
</html>
