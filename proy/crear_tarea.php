<?php
include('conexion.php');  // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura los datos del formulario
    $nombre = $_POST['nombreGrupo'];
    $descripcion = $_POST['descripcionGrupo'];
    

    $usuario = $_POST['usuario'];
    $id_usuario = $_POST['id_usuario'];
    $grupo = $_POST['grupo'];
    $id_grupo = $_POST['id_grupo'];
    $id_grupo2 = $_GET['grupo_o'];


    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    

    $sql = "CALL InsertarTarea('$nombre', $id_grupo, '$descripcion', 1)";



   
    if ($conn->query($sql) === TRUE) {
       

       // header("Location: Grupos_chat.php?username=$usuario2&id_grupo=$idgrupo&grupo=$grupo");
       header("Location: Tareas.php?username=$usuario &grupo=$grupo&id_grupo=$id_grupo&idgrupo2= $id_grupo2");
       exit;
       
    } else {
        
        echo "Error al insertar registro: " . $conn->error;
    }



   
   

    
    
    
} 
  


// Cerrar la conexión
$conn->close();
?>

