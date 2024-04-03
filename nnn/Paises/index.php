<!DOCTYPE html>
<html>
<head>
    <title>Información de Países</title>
</head>
<body>
    <h1>Información de Países</h1>

    <?php
    // Obtener el JSON de la URL
    $json_url = 'https://restcountries.com/v3.1/all';
    $json_data = file_get_contents($json_url);

    // Decodificar el JSON en un arreglo asociativo
    $countries = json_decode($json_data, true);

    if ($countries) {
        echo '<table border="1">';
        echo '<tr><th>Nombre del País</th><th>Capital</th><th>Link a Google Maps</th></tr>';

        foreach ($countries as $country) {
            $nombre = $country['name']['common'];
            $capital = isset($country['capital'][0]) ? $country['capital'][0] : 'No especificada';
            $googleMapsLink = "https://www.google.com/maps/place/" . urlencode($capital);

            echo '<tr>';
            echo '<td>' . $nombre . '</td>';
            echo '<td>' . $capital . '</td>';
            echo '<td><a href="' . $googleMapsLink . '" target="_blank">Ver en Google Maps</a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No se pudo cargar la información de los países.';
    }
    ?>

</body>
</html>
