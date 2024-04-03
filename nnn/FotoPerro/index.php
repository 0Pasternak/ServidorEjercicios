<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Imagen de Perro:</h1>

    <?php
    $api_url = 'https://dog.ceo/api/breeds/image/random';

    $json_data = file_get_contents($api_url);

    $data = json_decode($json_data, true);

    if ($data && $data['status'] === 'success') {
        $imagen_perro = $data['message'];
        echo '<img src="' . $imagen_perro . '" alt="Perro Aleatorio">';
    } else {
        echo 'No se pudo cargar la imagen de perro aleatorio.';
    }
    ?>

</body>
</html>
