<?php
include('conexion.php');  // Incluye el archivo de conexión

if (isset($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];
    $usuario = $_POST['usuario'];
    $id_usuario = $_POST['id_usuario'];
    $grupo = $_POST['grupo'];
    $id_grupo = $_POST['id_grupo'];

    
    // Aquí puedes hacer lo que necesites con el mensaje y las variables de usuario
    // ...
    //echo "Mensaje recibido: $mensaje de $usuario a $usuario2";

    $sql = "INSERT INTO Mensajes_grupo (Contenido, FechaEnvio, RemitenteID, Grupo_ID)
    VALUES ('$mensaje', NOW(), $id_usuario, $id_grupo)";



if ($conn->query($sql) === TRUE) {
    //echo "Mensaje guardado correctamente.";
    
    header("Location: Grupos_chat.php?username=$usuario &grupo=$grupo&id_grupo=$id_grupo");



   
} else {
    //echo "Error al guardar el mensaje: " . $conn->error;
}

$conn->close();

} else {
    echo "No se recibió ningún mensaje.";
}

?>
