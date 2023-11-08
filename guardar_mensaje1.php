<?php
include('conexion.php');  // Incluye el archivo de conexión

$remitente = $_POST['remitente'];
$destinatario = $_POST['destinatario'];
$contenido = $_POST['contenido'];

error_log("Recibiendo datos: Remitente: $remitente, Destinatario: $destinatario, Contenido: $contenido");

$sql = "INSERT INTO Mensajes (Contenido, FechaEnvio, RemitenteID, DestinatarioID) 
        VALUES ('$contenido', CURRENT_TIMESTAMP, 
            (SELECT ID FROM Usuarios WHERE Usuario = '$remitente' LIMIT 1), 
            (SELECT ID FROM Usuarios WHERE Usuario = '$destinatario' LIMIT 1))";

/*
$sql = "INSERT INTO Mensajes (Contenido, FechaEnvio, RemitenteID, DestinatarioID) 
        VALUES ('$contenido', NOW(), 
            (SELECT ID FROM Usuarios WHERE Usuario = '$remitente' LIMIT 1), 
            (SELECT ID FROM Usuarios WHERE Usuario = '$destinatario' LIMIT 1))";
*/
error_log("Consulta SQL: $sql"); 

if ($conn->query($sql) === TRUE) {
    echo "Mensaje guardado correctamente.";
} else {
    echo "Error al guardar el mensaje: " . $conn->error;
}

$conn->close();
?>
