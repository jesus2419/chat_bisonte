<?php
include('conexion.php');  // Incluye el archivo de conexión

// Obtén el usuario destino desde la solicitud GET
//$usuarioDestino = $_GET['usuario_destino'];


// Obtén el nombre de usuario del usuario actual (puedes obtenerlo de tu sesión)
// Supondré que está en una variable llamada $usuarioActual
// Reemplaza esta parte con la lógica real para obtener el usuario actual en tu aplicación
$usuarioActual = 'nombre_de_usuario_actual';



// Consulta SQL para obtener la conversación
$sql = "SELECT m.Contenido, m.FechaEnvio, u.Usuario as Remitente
        FROM Mensajes m
        INNER JOIN Usuarios u ON m.RemitenteID = u.ID
        WHERE (m.RemitenteID = 3 AND m.DestinatarioID = 1) OR
              (m.RemitenteID = 1 AND m.DestinatarioID = 3)
        ORDER BY m.FechaEnvio";
/*
$sql = "SELECT Contenido, FechaEnvio, RemitenteID
        FROM Mensajes
        WHERE (RemitenteID = 3 AND DestinatarioID = 1) OR
              (RemitenteID = 1 AND DestinatarioID = 3)
        ORDER BY FechaEnvio";
*/
$resultado = $conn->query($sql);

// ... Tu código para obtener la conversación ...

if ($resultado->num_rows > 0) {
    $conversacion = array();

    while ($fila = $resultado->fetch_assoc()) {
        $conversacion[] = $fila;
    }

    echo json_encode($conversacion);
} else {
    echo json_encode(array());
}


$conn->close();
?>
