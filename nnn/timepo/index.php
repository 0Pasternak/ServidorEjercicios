<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Consulta del Tiempo</h1>
    
    <form action="mostrarTiempo.php" method="post">
        <label for="location">Selecciona una ubicación:</label>
        <select name="location" id="location">
            <option value="alcorcon">Alcorcón</option>
            <option value="mostoles">Móstoles</option>
            <option value="leganes">Leganés</option>
        </select>
        <input type="submit" value="Obtener Tiempo">
    </form>
    


    
    
</body>
</html>