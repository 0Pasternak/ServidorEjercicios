<?php
include 'conexion.php';

$sql = "SELECT * FROM administradores";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $file = 'lista_admin.csv';

    $fp = fopen($file, 'w');

    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }

    fclose($fp);

} else {
    echo "No se encontraron datos para exportar";
}
$conn->close();
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$file = fopen("lista_admin.csv", "r");


if ($file) {
    while (($data = fgetcsv($file)) !== false) {
        if ($data[1] == $usuario && $data[2] == $password) {
            header("Location: guardar_productos.php");
            exit();
        }
    }
    fclose($file);
} else {
    echo 'No se pudo abrir el archivo de contactos.';
}

?>