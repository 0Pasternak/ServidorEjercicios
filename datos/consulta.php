<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if (!isset($_POST['nif']) || !isset($_POST['codigo'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan datos"]);
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carnet24";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$sql = "SELECT nombreapellidos, annonacimiento FROM usuarioscj24 WHERE nif = ? AND codigoacceso = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $_POST['nif'], $_POST['codigo']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = [
            "nombreapellidos" => $row["nombreapellidos"],
            "annonacimiento" => $row["annonacimiento"]
        ];
    }
    echo json_encode($data);
} else {
    http_response_code(404);
    echo json_encode(["error" => "Usuario no encontrado"]);
}

$stmt->close();
$conn->close();
?>
