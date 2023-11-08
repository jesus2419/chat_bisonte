<?php
include('conexion.php');  // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura los datos del formulario
    $nombre = $_POST['nombreGrupo'];
    $descripcion = $_POST['descripcionGrupo'];


    if (isset($_FILES['fotoGrupo']) && !empty($_FILES['fotoGrupo']['name']) && $_FILES['fotoGrupo']['error'] === 0) {
        $nombreImagen = $_FILES['fotoGrupo']['name'];
        $tamañoImagen = $_FILES['fotoGrupo']['size'];
        $tipoImagen = $_FILES['fotoGrupo']['type'];
        $tempImagen = $_FILES['fotoGrupo']['tmp_name'];

        if ($tamañoImagen <= 1048576) { // Tamaño máximo de 1 MB
            $imagenContenido = addslashes(file_get_contents($tempImagen));

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }
            $usuario2 = $_POST['usuario'];
    
  
            $sql = "CALL CrearGrupoConMiembro('$nombre', '$descripcion', (SELECT ID FROM Usuarios WHERE Usuario = '$usuario2' LIMIT 1),  '$imagenContenido')";
        
            if ($conn->query($sql) === TRUE) {
                //echo "Registro insertado correctamente.";
        
                header("Location: Grupos.php?username=$usuario2");
               
        
               
            } else {
                echo "Error al insertar registro: " . $conn->error;
            }
        } else {
            echo "El tamaño del archivo excede el límite de 1 MB.";
        }
    } else {
        echo "Por favor, seleccione una imagen.";
    }

    // El nombre de usuario ya existe, puedes mostrar un mensaje de error
    
    
} else {
    echo "Tamaño de la imagen demasiado grande. El tamaño máximo permitido es 1 MB.";
}
  


// Cerrar la conexión
$conn->close();
?>

