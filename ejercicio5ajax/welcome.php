<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
</head>
<body>
    <h2>Bienvenido <?php echo $_SESSION['nombre_usuario']; ?></h2>
    
    <form action="acciones.php" method="post">
        <input type="submit" name="eliminar_cuenta" value="Eliminar Cuenta">
    </form>
    
    <h3>Editar Datos</h3>
    <form action="acciones.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre_usuario']; ?>"><br>
        <label for="email">Correo:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['correo_usuario']; ?>"><br><br>
        <input type="submit" name="editar_datos" value="Guardar Cambios">
    </form>



    <h2>Calculadora de Calorías</h2>
    <form id="caloriesForm">
        <label for="sexo">Sexo:</label><br>
        <select id="sexo" name="sexo">
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
        </select><br>
        <label for="peso">Peso (kg):</label><br>
        <input type="number" id="peso" name="peso" required><br>
        <label for="altura">Altura (cm):</label><br>
        <input type="number" id="altura" name="altura" required><br>
        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad" required><br>
        <label for="actividad">Actividad Física:</label><br>
        <select id="actividad" name="actividad">
            <option value="Inactiva">Inactiva</option>
            <option value="Actividad Ligera">Actividad Ligera</option>
            <option value="Actividad Media">Actividad Media</option>
            <option value="Muy Activa">Muy Activa</option>
            <option value="Actividad Extrema">Actividad Extrema</option>
        </select><br><br>
        <input type="button" value="Calcular" onclick="calcularCalorias()">
    </form>
    <div id="resultado"></div>


    <script>
        function calcularCalorias() {
            var sexo = document.getElementById('sexo').value;
            var peso = parseFloat(document.getElementById('peso').value);
            var altura = parseFloat(document.getElementById('altura').value);
            var edad = parseInt(document.getElementById('edad').value);
            var actividad = document.getElementById('actividad').value;

            var rmb;
            if (sexo === 'Hombre') {
                rmb = 66.473 + (13.752 * peso) + (5.0033 * altura) - (6.755 * edad);
            } else {
                rmb = 655.0955 + (9.463 * peso) + (1.8496 * altura) - (4.6756 * edad);
            }

            var factorActividad;
            switch (actividad) {
                case 'Inactiva':
                    factorActividad = 1;
                    break;
                case 'Actividad Ligera':
                    factorActividad = 1.2;
                    break;
                case 'Actividad Media':
                    factorActividad = 1.4;
                    break;
                case 'Muy Activa':
                    factorActividad = 1.6;
                    break;
                case 'Actividad Extrema':
                    factorActividad = 1.8;
                    break;
                default:
                    factorActividad = 1;
            }

            var calorias = rmb * factorActividad;
            document.getElementById('resultado').innerHTML = "RMB: " + rmb.toFixed(2) + " Kcal/día<br>Consumo calórico ideal diario: " + calorias.toFixed(2) + " Kcal/día";
        }
    </script>


</body>
</html>
