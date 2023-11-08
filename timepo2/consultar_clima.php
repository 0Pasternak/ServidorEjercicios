<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if (isset($_POST['location'])) {
        $location = $_POST['location'];
        $url = '';

        // Establecer la URL según la ubicación seleccionada
        if ($location === 'getafe') {
            $url = 'https://www.aemet.es/xml/municipios/localidad_28065.xml'; 
        } elseif ($location === 'mostoles') {
            $url = 'https://www.aemet.es/xml/municipios/localidad_28092.xml'; 
        } elseif ($location === 'leganes') {
            $url = 'https://www.aemet.es/xml/municipios/localidad_28074.xml'; 
        }

        // Obtener y cargar el XML desde la URL
        $xml = simplexml_load_file($url);

        $prediccion = $xml->prediccion->dia;

        echo "<h3>Temperaturas para los próximos 3 días en $location:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Día</th><th>Temperatura Mínima (°C)</th><th>Temperatura Máxima (°C)</th></tr>";

        for ($i = 0; $i < 3; $i++) {
            $fecha = $prediccion[$i]['fecha'];
            $minima = $prediccion[$i]->temperatura->minima;
            $maxima = $prediccion[$i]->temperatura->maxima;

            echo "<tr><td>$fecha</td><td>$minima °C</td><td>$maxima °C</td></tr>";
        }

        echo "</table>";
        echo"<form action='consultar_clima.php' method='post'>
        <label for='municipios'>Seleccione un municipio:</label>
        <select name='location' id='location'>
            <option value='getafe'>Geafe</option>
            <option value='mostoles'>Mostoles</option>
            <option value='leganes'>Leganes</option>
        </select>
        <input type='submit' name='ver' value='Ver'>
    </form>";
    }
    ?>
    
</body>
</html>