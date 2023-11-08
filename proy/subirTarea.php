<?php
// Verificar si se envió un archivo
if ($_FILES["archivo"]["error"] == 0) {
    // Conectar a la base de datos (ajusta los valores según tu configuración)
    include('conexion.php');  // Incluye el archivo de conexión


    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    
    $descripcion = $_POST['descripcionGrupo'];
    $grupo = $_POST['id_grupo'];
    $grupo_nombre = $_POST['grupo'];
    $id_usuario = $_POST['usuarioid'];
    $usuario = $_POST['usuario'];
    $id_grupo2 = $_POST['grupo_o'];
    $id = $_POST['id'];
    
    // Ruta temporal del archivo subido
    $archivo_temporal = $_FILES["archivo"]["tmp_name"];

    // Leer el contenido del archivo
    $archivo_contenido = file_get_contents($archivo_temporal);

    // Escapar el contenido para prevenir inyecciones SQL
    $archivo_contenido = $conn->real_escape_string($archivo_contenido);

    // Insertar el archivo PDF en la base de datos
    //$sql = "INSERT INTO archivo (contenido) VALUES ('$archivo_contenido')";
    

    $sql = "CALL InsertarTareaSubGrupo($id, $id_usuario, '$descripcion', '$archivo_contenido', 1);";
        
    if ($conn->query($sql) === true) {
        header("Location: Tareas.php?username=$usuario &grupo=$grupo_nombre&id_grupo=$grupo&idgrupo2= $id_grupo2");

        //echo "El archivo PDF se ha subido y almacenado correctamente en la base de datos.";
    } else {
        echo "Error al insertar el archivo PDF: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Error al subir el archivo.";
}
?>
