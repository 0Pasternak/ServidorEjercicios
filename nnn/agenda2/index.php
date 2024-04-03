<!DOCTYPE html>
<html>
<head>
    <title>Mis Contactos</title>
</head>
<body>
    <h1>Mis Contactos</h1>

    <?php
    $json_url = 'http://localhost/aplicacion2/agenda2/contactos.php';

    $json_data = file_get_contents($json_url);

    $contacts = json_decode($json_data, true);

    if ($contacts) {
        echo '<ul>';
        foreach ($contacts as $contact) {
            echo '<li>';
            echo 'Nombre: ' . $contact['nombre'] . '<br>';
            echo 'Correo: ' . $contact['correo'] . '<br>';
            echo 'Teléfono: ' . $contact['telefono'] . '<br>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No se pudo cargar la lista de contactos.';
    }
    ?>
</body>
</html>
