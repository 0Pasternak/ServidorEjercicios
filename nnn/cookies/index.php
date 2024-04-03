<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //compuebe con esto si el usuario ha elegido y con ello se ha enviado la categoria
    if (isset($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
        //creamos una cookie con la categria elegida    
        setcookie('categoriaElegida', $categoria, time() + 3600 * 24 * 30);    
    } else {    
        // Comprueba si la cookie categoria existe.
        if (isset($COOKIE['categoriaElegida'])) {
            // Si existe, asigna el valor a $categoria.
            $categoria = $COOKIE['categoriaElegida'];
        }
    }
    

    // Lee el archivo CSV en funcion de la categoria muestra el frm y el resultado si hay cookie, si no solo el form
    if (isset($categoria)) {
        $productos = array_map('str_getcsv', file('productos.csv'));
        echo "<h2>Productos de la categoría $categoria:</h2>";
        echo "<ul>";
        foreach ($productos as $producto) {
            if ($producto[0] === $categoria) {
                echo "<li>Talla: " . $producto[1] . ", Color: " . $producto[2] . "</li>";
            }
        }
        echo "</ul>";
        echo "<form method='post' action='index.php'>
            <label for='categoria'>Selecciona una categoría:</label>
            <select name='categoria' id='categoria'>
                <option value='camisetas'>Camisetas</option>
                <option value='pantalones'>Pantalones</option>
            </select>
            <input type='submit' value='Mostrar productos'>
            </form>";
    } else {
        echo "<form method='post' action='index.php'>
            <label for='categoria'>Selecciona una categoría:</label>
            <select name='categoria' id='categoria'>
                <option value='camisetas'>Camisetas</option>
                <option value='pantalones'>Pantalones</option>
            </select>
            <input type='submit' value='Mostrar productos'>
            </form>";
    }
    ?>


</body>

</html>