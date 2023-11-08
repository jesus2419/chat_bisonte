<?php
include('conexion.php');  // Incluye el archivo de conexión


   
    $usuario = $_GET['usuarioc'];
    $id_usuario = $_GET['id'];
    $grupo = $_GET['nombre_grupo'];
    $id_grupo = $_GET['id_grupo'];

    
    // Aquí puedes hacer lo que necesites con el mensaje y las variables de usuario
    // ...
    //echo "Mensaje recibido: $mensaje de $usuario a $usuario2";

    $sql = "INSERT INTO MiembrosGrupo (UsuarioID, GrupoID, FechaUnion)
    VALUES ($id_usuario, $id_grupo, NOW());";



if ($conn->query($sql) === TRUE) {
    //echo "Mensaje guardado correctamente.";
    
    header("Location: Grupos_chat.php?username=$usuario &grupo=$grupo&id_grupo=$id_grupo");



   
} else {
    //echo "Error al guardar el mensaje: " . $conn->error;
}

$conn->close();


?>
