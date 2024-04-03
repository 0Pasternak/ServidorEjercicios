<!DOCTYPE html>
<html>
<head>
    <title>Información del Tiempo</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Información del Tiempo</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['location'])) {
            $location = $_POST['location'];
            $url = '';

            // Establecer la URL según la ubicación seleccionada
            if ($location === 'alcorcon') {
                $url = 'https://www.aemet.es/xml/municipios_h/localidad_h_28007.xml'; 
            } elseif ($location === 'mostoles') {
                $url = 'https://www.aemet.es/xml/municipios/localidad_28092.xml'; 
            } elseif ($location === 'leganes') {
                $url = 'https://www.aemet.es/xml/municipios/localidad_28074.xml'; 
            }

            // Obtener y cargar el XML desde la URL
            $xml = simplexml_load_file($url);

            if ($xml) {
                echo "<h2>Tiempo en " . ucfirst($location) . "</h2>";
                echo "<table>";
                echo "<tr><th>Día</th><th>Descripción</th><th>Temperatura</th></tr>";

                foreach ($xml->forecast as $forecast) {
                    echo "<tr>";
                    echo "<td>" . $forecast->day . "</td>";
                    echo "<td>" . $forecast->description . "</td>";
                    echo "<td>" . $forecast->temperature . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No se pudo cargar el archivo XML desde la URL.";
            }
        } else {
            echo "No se ha seleccionado una ubicación.";
        }
    }
    ?>
</body>
</html>
