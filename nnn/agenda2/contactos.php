<?php

class Contacto {
    public $nombre;
    public $correo;
    public $telefono;

    public function __construct($nombre, $correo, $telefono) {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
    }
}


// $contacto1 = new Contacto("Juan Pérez", "juan@example.com", "123-456-7890");
// $contacto2 = new Contacto("María López", "maria@example.com", "987-654-3210");
// $contacto3 = new Contacto("Carlos Sánchez", "carlos@example.com", "555-123-4567");
// $contacto4 = new Contacto("Laura Torres", "laura@example.com", "777-888-9999");
// $contacto5 = new Contacto("Laura Torres", "laura@example.com", "777-888-9999");
// $contacto6 = new Contacto("Laura Torres", "laura@example.com", "777-888-9999");

$contactos = array();


    $file = fopen("contactos.csv", "r");/* r es porque lo abrimos en modo lectura*/

    //imprimir tabla
    if ($file) {
        // echo '<table>';
        // echo '<tr><th>Nombre</th><th>Apellido</th><th>Teléfono</th></tr>';

        while (($data = fgetcsv($file, null, ";")/*esto lee una linea de documento*/) !== false ) {
            /*si llega al final fgetcsv devuelve flase, por eso verificamos que sea distinto a false lo que nos de*/
            // echo '<tr>';
            /* lo que nos devulve fgetcsv($feli )y se almacena en $data es un array */
                /*iteramos en el array y cada cosa que sacamos */
                // echo '<td>' . htmlspecialchars($value) . '</td>';/*se creaa una celda y se introduce el valor*/
                $contacto = new Contacto($data[0], $data[1],$data[2]);
                $contactos[] = $contacto;
                
            
            // echo '</tr>';
        }

       
        fclose($file);
    } else {
       
    }





$json_contactos = json_encode($contactos);



echo $json_contactos;
?>
