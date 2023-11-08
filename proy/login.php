<?php
include('conexion.php');  // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password1 = $_POST['password'];

    $sql = "SELECT * FROM Usuarios
            WHERE
            Usuario = '$username' AND Contraseña = '$password1' ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header("Location: chat.php?username=$username");
        
        
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}

$conn->close();
?>
