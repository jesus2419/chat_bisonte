<?php
// Conectar a la base de datos (ajusta los valores según tu configuración)
include('conexion.php');  // Incluye el archivo de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta la base de datos para obtener el contenido del archivo
    $sql = "SELECT contenido FROM archivo WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $contenido = $row['contenido'];

        // Define las cabeceras HTTP para que el navegador interprete el contenido como un archivo PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="archivo.pdf"');
        header('Content-Length: ' . strlen($contenido));

        // Entrega el contenido del archivo
        echo $contenido;
    } else {
        echo "El archivo no se encontró en la base de datos.";
    }
} else {
    echo "Identificador de archivo no proporcionado.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
