<?php
include('conexion.php');  // Incluye el archivo de conexión

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$tipoUsuario = $_POST['tipo_usuario'];

// Conexión a la base de datos




if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "CALL InsertarUsuario('$usuario', '$contrasena', '$nombre', '$apellidos', '$telefono', '$tipoUsuario', NULL)";
if ($conn->query($sql) === TRUE) {
   // echo "Usuario registrado correctamente.";
    header("Location: chats.php?username=$usuario");
} else {
    echo "Error al registrar el usuario: " . $conn->error;
}

$conn->close();
?>
