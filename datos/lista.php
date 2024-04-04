<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carnet24";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT nif, nombreapellidos, annonacimiento FROM usuarioscj24";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = [
            "nif" => $row["nif"],
            "nombreapellidos" => $row["nombreapellidos"],
            "annonacimiento" => $row["annonacimiento"]
        ];
    }
    echo json_encode($data);
} else {
    http_response_code(404);
    echo json_encode(["error" => "No se encontraron usuarios"]);
}

$conn->close();
?>
