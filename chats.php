<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla de Chats</title>
</head>
<body>
    <?php
    // Obtén el nombre de usuario de la URL
    $username = $_GET['username'];

    echo "<h1>Bienvenido, $username</h1>";
    ?>






       <?php
    // Realizar la conexión a la base de datos
    include('conexion.php');

    // Consulta para obtener información del usuario 'geralt'
    $sqlConsulta = "SELECT * FROM Usuarios WHERE Usuario = '$username'";

    $resultConsulta = $conn->query($sqlConsulta);

    if ($resultConsulta->num_rows > 0) {
        // Obtener el primer resultado (asumiendo que solo habrá uno)
        $row = $resultConsulta->fetch_assoc();

        // Asignar los valores a variables para usar en el HTML
        $ID = $row["ID"];
        
        // ... Continuar con los demás campos ...
    } else {
        echo "No se encontraron resultados para el usuario '$username'.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

    <h2>Seleccione un usuario para chatear:</h2>
    <select id="usuarios" name="usuarios" >
        <option value=""></option>
        <?php
        // Conexión a la base de datos
        include('conexion.php');  // Asegúrate de incluir la conexión aquí

        // Obtén todos los usuarios excepto el actual
        $query = "SELECT Usuario FROM Usuarios WHERE Usuario != '$username'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuario = $row['Usuario'];
                echo "<option value='$usuario'>$usuario</option>";
            }
        }

        $conn->close();
        ?>
    </select>
    <div id="conversacion"></div>

    


    <div id="chat">
        <h2>Chat con [Nombre del Usuario Seleccionado]</h2>
        <div id="mensajes">
            <!-- Aquí se mostrarán los mensajes del chat -->
        </div>
        <textarea id="mensaje" placeholder="Escriba su mensaje"></textarea>
        <button onclick="enviarMensaje('<?php echo $username; ?>')">Enviar</button>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="chats.js"></script>
    <script>
    /* 
    $(document).ready(function() {
    // Llamada inicial a la función para mostrar la conversación
    mostrarConversacion(<?php// echo $ID; ?>);

    // Agrega un escuchador de eventos para el cambio en el select
    $('#usuariosSelect').on('change', function() {
        // Obtiene el valor seleccionado en el select
        var usuarioDestino = $(this).val();

        // Llama a la función para mostrar la conversación con el nuevo usuario
          mostrarConversacion(usuarioDestino);
        });
         });
       */
     mostrarConversacion(<?php echo $ID; ?>);

     </script>
</body>
</html>

