<!-- Las cookies en PHP son pequeños archivos de datos que se almacenan en el lado del cliente (
    navegador) y se utilizan para almacenar información sobre la sesión del usuario. Pueden 
    contener datos como preferencias del usuario, información de inicio de sesión, y otros 
    detalles relevantes para la interacción del usuario con el sitio web. Las cookies son una 
    forma de persistir información entre las solicitudes del usuario.

A continuación, te proporcionaré un ejemplo simple de cómo usar cookies en PHP. 
En este ejemplo, crearemos una cookie para almacenar el nombre de usuario y luego 
la recuperaremos en las solicitudes subsiguientes:

Ejemplo de código PHP para usar cookies:
index.php
php
Copy code -->
<?php
// Verificar si el formulario de inicio de sesión ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger el nombre de usuario desde el formulario
    $username = $_POST["username"];

    // Establecer una cookie con el nombre de usuario
    setcookie("username", $username, time() + 3600, "/"); // Expira en 1 hora
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uso de Cookies en PHP</title>
</head>
<body>

<?php
// Verificar si la cookie está presente
if (isset($_COOKIE["username"])) {
    $username = $_COOKIE["username"];
    echo "<p>Bienvenido de nuevo, $username!</p>";
} else {
    echo "<p>Bienvenido, invitado.</p>";
}
?>

<!-- Formulario de inicio de sesión -->
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="username">Nombre de Usuario:</label>
    <input type="text" name="username" id="username" required>
    <button type="submit">Iniciar Sesión</button>
</form>

</body>
</html>
<!-- En este ejemplo:

Cuando el formulario se envía, el nombre de usuario se recoge del formulario y se establece una cookie llamada "username" con el valor proporcionado. La cookie expirará en 1 hora (time() + 3600).
Cuando se carga la página, se verifica si la cookie "username" está presente. Si es así, se saluda al usuario por su nombre de usuario almacenado en la cookie. Si no hay cookie, se muestra un mensaje de bienvenida para un invitado.
El formulario de inicio de sesión permite a los usuarios ingresar su nombre de usuario, y al enviarlo, se crea o actualiza la cookie.
Recuerda que el manejo de cookies en PHP debe realizarse antes de enviar cualquier contenido al navegador, por lo que las funciones de setcookie() deben llamarse antes de la salida HTML en tu script. -->