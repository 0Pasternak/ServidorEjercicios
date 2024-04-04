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


$sql = "DELETE FROM usuarioscj24 WHERE nif = ? && codigoacceso = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $_POST['nif'], $_POST['codigo']);
$stmt->execute();
$result = $stmt->get_result();



$stmt->close();
$conn->close();
?>
