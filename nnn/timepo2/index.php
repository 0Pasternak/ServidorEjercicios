<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="consultar_clima.php" method="post">
    <label for="municipios">Seleccione un municipio:</label>
    <select name="location" id="location">
        <option value="getafe">Getafe</option>
        <option value="mostoles">Mostoles</option>
        <option value="leganes">Leganes</option>
    </select>
    <input type="submit" name="ver" value="Ver">
</form>
    
</body>
</html>
