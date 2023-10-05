<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    function mostrarContactos() {

        $archivo = 'horario.csv';

        $diccionario = [
            '1' => 'Pº. Recoletos',
            '2' => 'Glta. de Carlos V',
            '3' => '',
            '35' => 'Pza. del Carmen',
            '4' => 'Pza. de España',
            '5' => '',
            '39' => 'Barrio del Pilar',
            '6' => 'Pza. Dr. Marañón ',
            '7' => 'Pza. M. de Salamanca ',
            '8' => 'Escuelas Aguirre',
            '9' => 'Pza. Luca de Tena ',
            '10' => '',
            '38' => 'Cuatro Caminos',
            '11' => 'Av. Ramón y Cajal',
            '12' => 'Pza. Manuel Becerra',
            '13' => '',
            '40' => 'Vallecas',
            '14' => 'Pza. Fdez. Ladreda',
            '15' => 'Pza. Castilla',
            '16' => 'Arturo Soria',
            '17' => 'Villaverde Alto',
            '18' => 'C/ Farolillo',
            '19' => 'Huerta Castañeda',
            '20' => '',
            '36' => 'Moratalaz',
            '21' => 'Pza. Cristo Rey ',
            '22' => 'Pº. Pontones ',
            '23' => 'Final C/ Alcalá ',
            '24' => 'Casa de Campo',
            '25' => 'Santa Eugenia ',
            '26' => 'Urb. Embajada (Barajas)',
            '27' => 'Barajas',
            '47' => 'Méndez Álvaro Alta',
            '48' => 'Pº. Castellana Alta',
            '49' => 'Retiro Alta',
            '50' => 'Pza. Castilla Alta',
            '54' => 'Ensanche Vallecas Alta',
            '55' => 'Urb. Embajada (Barajas) Alta',
            '56' => 'Plaza Elíptica Alta',
            '57' => 'Sanchinarro Alta',
            '58' => 'El Pardo Alta',
            '59' => 'Parque Juan Carlos I Alta',
            '86' => '',
            '60' => 'Tres Olivos Alta'
        ];

        $magnitudes = [
            '1' => 'Dióxido de Azufre (SO2)',
            '6' => 'Monóxido de Carbono (CO)',
            '7' => 'Monóxido de Nitrógeno (NO)',
            '8' => 'Dióxido de Nitrógeno (NO2)',
            '9' => 'Partículas < 2.5 µm (PM2.5)',
            '10' => 'Partículas < 10 µm (PM10)',
            '12' => 'Óxidos de Nitrógeno (NOx)',
            '14' => 'Ozono (O3)',
            '20' => 'Tolueno (TOL)',
            '30' => 'Benceno (BEN)',
            '35' => 'Etilbenceno (EBE)',
            '37' => 'Metaxileno (MXY)',
            '38' => 'Paraxileno (PXY)',
            '39' => 'Ortoxileno (OXY)',
            '42' => 'Hidrocarburos totales (hexano) (TCH)',
            '43' => 'Metano (CH4)',
            '44' => 'Hidrocarburos no metánicos (hexano)'
        ];

        echo "<table>";
        if (($leer = fopen($archivo, 'r')) !== false) {
            while (($fila = fgetcsv($leer, 1000, ';')) !== false) {
                if (count($fila) >= 8) {
                    $valorColumna2 = $fila[2]; 
                    
                    if (isset($diccionario[$valorColumna2])) {
                        $fila[2] = $diccionario[$valorColumna2]; 
                    }
                    $valorColumna3 = $fila[3]; 
                    if (isset($magnitudes[$valorColumna3])) {
                        $fila[3] = $magnitudes[$valorColumna3]; 
                    }
                    $filaHTML = "<tr>";
                    
                    echo "<td>" . $fila[2] . "</td>" . "<td>" . $fila[3] . "</td>" . "<td>" . $fila[8] . "</td>";
                    for ($i = 8; $i <= 56; $i += 2) {
                        if ($i >= 0 && $i < count($fila)) {
                            echo "<td>" . $fila[$i] . "</td>";
                        }
                    }
                    echo "</tr>";
                } else {
                    echo "La fila no tiene suficientes columnas.<br>";
                }
            }
            fclose($leer);
        } else {
            echo "No se pudo abrir el archivo.";
        }
        echo "</table>";
    }
    mostrarContactos();


    ?>
</body>
</html>