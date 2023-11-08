<?php


include('conexion.php');  // Incluye el archivo de conexión

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$check_query = "SELECT * FROM Usuarios WHERE Usuario='$usuario'";
$result = $conn->query($check_query);

if ($result->num_rows > 0) {
    // El nombre de usuario ya existe, puedes mostrar un mensaje de error
    echo "El nombre de usuario ya está en uso. Por favor, elige otro nombre de usuario.";
} else {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $tipoUsuario = $_POST['tipo_usuario'];

    if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['name']) && $_FILES['imagen']['error'] === 0) {
        $nombreImagen = $_FILES['imagen']['name'];
        $tamañoImagen = $_FILES['imagen']['size'];
        $tipoImagen = $_FILES['imagen']['type'];
        $tempImagen = $_FILES['imagen']['tmp_name'];

        if ($tamañoImagen <= 1048576) { // Tamaño máximo de 1 MB
            $imagenContenido = addslashes(file_get_contents($tempImagen));

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "CALL InsertarUsuario('$usuario', '$contrasena', '$nombre', '$apellidos', '$telefono', '$tipoUsuario', '$imagenContenido')";
            if ($conn->query($sql) === TRUE) {
                header("Location: chat.php?username=$usuario");
            } else {
                echo "Error al registrar el usuario: " . $conn->error;
            }
        } else {
            echo "El tamaño del archivo excede el límite de 1 MB.";
        }
    } else {
        echo "Por favor, seleccione una imagen.";
    }
}

$conn->close();



/*
include('conexion.php');  // Incluye el archivo de conexión

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$check_query = "SELECT * FROM Usuarios WHERE Usuario='$usuario'";
$result = $conn->query($check_query);

if ($result->num_rows > 0) {
    // El nombre de usuario ya existe, puedes mostrar un mensaje de error
    echo "El nombre de usuario ya está en uso. Por favor, elige otro nombre de usuario.";
} else {
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$tipoUsuario = $_POST['tipo_usuario'];

// Conexión a la base de datos

$nombreImagen = $_FILES['imagen']['name'];
$tamañoImagen = $_FILES['imagen']['size'];
$tipoImagen = $_FILES['imagen']['type'];
$tempImagen = $_FILES['imagen']['tmp_name'];
if ($tamañoImagen <= 1048576) { // Tamaño máximo de 1 MB
$imagenContenido = addslashes(file_get_contents($tempImagen));

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "CALL InsertarUsuario('$usuario', '$contrasena', '$nombre', '$apellidos', '$telefono', '$tipoUsuario', '$imagenContenido')";
if ($conn->query($sql) === TRUE) {
   // echo "Usuario registrado correctamente.";
    header("Location: chat.php?username=$usuario");
} else {
    echo "Error al registrar el usuario: " . $conn->error;
}
}
}

$conn->close();
*/
?>
