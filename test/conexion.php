<?php
$servername = "localhost";  // Cambia a la dirección de tu servidor si es diferente
$username1 = "root";   // Cambia al nombre de usuario de tu base de datos
$password = ""; // Cambia a la contraseña de tu base de datos
$dbname = "test"; // Cambia al nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username1, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}
//echo "Conexión exitosa a la base de datos";
?>
