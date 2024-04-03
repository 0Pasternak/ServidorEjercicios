<?php
    include 'conexion.php';

$sql = "SELECT * FROM productos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $file = 'productos.csv';

    $fp = fopen($file, 'w');

    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }

    fclose($fp);
} else {
}

$conn->close();

class Contacto {
    public $id;
    public $nombre;
    public $precio;
    public $imagen;

    public function __construct($id, $nombre, $precio, $imagen) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imgen = $imagen;
    }
}



$contactos = array();

$file = fopen("productos.csv", "r");

if ($file) {
    while (($data = fgetcsv($file, null, ",")) !== false) {

        $contacto = new Contacto($data[0], $data[1], $data[2], $data[3]);
        $contactos[] = $contacto;
    }
    fclose($file);
} else {
    
}

$json_contactos = json_encode($contactos);

echo $json_contactos;



?>