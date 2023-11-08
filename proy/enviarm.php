<?php
include('conexion.php');  // Incluye el archivo de conexión

if (isset($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];
    $usuario = $_POST['usuario'];
    $usuario2 = $_POST['usuario2'];
    $ID2 = $_POST['ID2'];

    
    // Aquí puedes hacer lo que necesites con el mensaje y las variables de usuario
    // ...
    //echo "Mensaje recibido: $mensaje de $usuario a $usuario2";

    $sql = "INSERT INTO Mensajes (Contenido, FechaEnvio, RemitenteID, DestinatarioID) 
        VALUES ('$mensaje', CURRENT_TIMESTAMP, 
            (SELECT ID FROM Usuarios WHERE Usuario = '$usuario' LIMIT 1), 
            (SELECT ID FROM Usuarios WHERE Usuario = '$usuario2' LIMIT 1))";



if ($conn->query($sql) === TRUE) {
    //echo "Mensaje guardado correctamente.";
    
    header("Location: chatss.php?username=$usuario &otro_username=$usuario2&id=$ID2");
} else {
    //echo "Error al guardar el mensaje: " . $conn->error;
}

$conn->close();

} else {
    echo "No se recibió ningún mensaje.";
}

?>
