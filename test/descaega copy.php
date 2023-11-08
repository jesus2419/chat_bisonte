<!DOCTYPE html>
<html>
<head>
    <title>Archivos PDF</title>
</head>
<body>
    <h2>Archivos PDF</h2>
    <ul>
        <?php
        // Consulta la base de datos para obtener la lista de archivos
        include('conexion.php');  // Incluye el archivo de conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT ID FROM TareasSubGrupos";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['ID'];
                echo '<li><a href="decargar_copy.php?id=' . $id . '">Archivo ' . $id . '</a></li>';
            }
        } else {
            echo "No se encontraron archivos en la base de datos.";
        }

        $conn->close();
        ?>
    </ul>
</body>
</html>
