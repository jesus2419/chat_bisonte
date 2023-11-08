<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>

    <!-- <link rel="stylesheet" type="text/css" href="MyStyle.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/chatstyle.css">
    
 <!-- icono de la pagina -->
 <link rel="icon" href="../icon/bisonte.ico" type="image/x-icon">


    <link rel="stylesheet" type="text/css" href="../css/barraSuperior.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../js/barraSuperior.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
          // Selecciona el enlace por su ID
          var registroLink = document.getElementById("registroLink");
        
          // Agrega un evento de clic al enlace
          registroLink.addEventListener("click", function (event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace
            window.location.href = "inicio.html"; // Redirige a otro.html
          });
        });
    </script>

<?php
// Obtén el valor de usuario pasado en la URL
if (isset($_GET['username'])) {
    $usuario = $_GET['username'];
    //echo "Usuario: " . $usuario;
} else {
    echo "No se recibió un nombre de usuario.";
}
?>

    <?php
    // Realizar la conexión a la base de datos
    include('conexion.php');

    // Consulta para obtener información del usuario 'geralt'
    $sqlConsulta = "SELECT ID,
    Usuario,
    Contraseña,
    Nombre,
    Apellidos,
    Telefono,
    TipoUsuario,
    ImagenBlop from  Usuarios
                    WHERE
                        usuario = '$usuario'";

    $resultConsulta = $conn->query($sqlConsulta);

    if ($resultConsulta->num_rows > 0) {
        // Obtener el primer resultado (asumiendo que solo habrá uno)
        $row = $resultConsulta->fetch_assoc();

        // Asignar los valores a variables para usar en el HTML
        $usuaNombre = $row["Usuario"];
        $idd = $row["ID"];
        $usuaContra = $row["Contraseña"];
       
        $nombre = $row["Nombre"];
        $apellidop = $row["Apellidos"];
       
        $tipo = $row["TipoUsuario"];
        
        
        
        // ... Continuar con los demás campos ...
    } else {
        echo "No se encontraron resultados para el usuario '$usuario'.";
    }

    // Cerrar la conexión
    $conn->close();
                 
                ?>

    <style>
        


        .chat-sidebar {
            width: 30%;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .chat-main {
            flex-grow: 1;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .chat-list {
            list-style: none;
            padding: 0;
        }

        .chat-list-item {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
        }

        .chat-list-item:last-child {
            border-bottom: none;
        }

        .chat-message {
            background-color: #e2e2e2;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .chat-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .send-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100px;
            
        }
        .chat-icon {
            margin-right: 10px; /* Espacio entre la imagen y el texto */
            vertical-align: middle; /* Alinea verticalmente la imagen con el texto */
        
            /* display: block; */
            width: 30px;/* Ajusta el ancho según tus necesidades */
            height: 30px;/* Ajusta la altura según tus necesidades */
            
            /* position: relative; */
            background-color: #E4E8F0;
            border-radius: 50%;
        }

    </style>
<script>

function enviarMensaje() {
const mensaje = $('#mensaje').val(); // Obtenemos el contenido del textarea
const usuario = '<?php echo $usuario; ?>';
const usuario2 = '<?php echo $usuario2; ?>';
const ID2 = '<?php echo $ID2; ?>';

// Realizamos una solicitud AJAX para enviar el mensaje al otro PHP
$.ajax({
url: 'enviarm.php', // Reemplaza con la URL de tu PHP
type: 'POST',
data: {
    mensaje: mensaje,
    usuario: usuario,
    usuario2: usuario2
    ID2: ID2
},
success: function(response) {
    console.log('Mensaje enviado correctamente:', response);
    // Aquí puedes realizar acciones adicionales si es necesario
},
error: function(error) {
    console.error('Error al enviar el mensaje:', error);
}
});
}
</script>

 <?php
// Obtén el valor de usuario pasado en la URL
if (isset($_GET['username'])) {
    $usuario = $_GET['username'];
    $usuario2 = $_GET['otro_username'];
    $ID2 = $_GET['id'];
   // echo "Usuario: " . $usuario;
} else {
    echo "No se recibió un nombre de usuario.";
}
?>



       <?php
    // Realizar la conexión a la base de datos
    include('conexion.php');

    // Consulta para obtener información del usuario
    $sqlConsulta = "SELECT * FROM Usuarios WHERE Usuario = '$usuario'";

    $resultConsulta = $conn->query($sqlConsulta);

    if ($resultConsulta->num_rows > 0) {
        // Obtener el primer resultado (asumiendo que solo habrá uno)
        $row = $resultConsulta->fetch_assoc();

        // Asignar los valores a variables para usar en el HTML
        $ID = $row["ID"];
        
        // ... Continuar con los demás campos ...
    }  else {
        echo "No se encontraron resultados para el usuario '$usuario'.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>
    


</head>
<body>
    <header>
        <a href="#" class ="imagenUsuario">

        <?php
    // Obtén el nombre de usuario de alguna manera
     $nombreUsuario = $idd; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
     //echo $idd;
    if ($nombreUsuario) {
    // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
        $nombreUsuarioURL = urlencode($nombreUsuario);
    
       // Genera la URL de la imagen con el nombre de usuario como parámetro
      $urlImagen = "mostrar2.php?id=$nombreUsuarioURL";

       // Muestra la imagen
        echo "<img src='$urlImagen' alt='Imagen desde la base de datos'  >";
    } else {
         echo "No se ha especificado un nombre de usuario.";
    }
    ?>
          <!--  <img src="../img/user.jpeg" alt = "User"  >  -->
            
            <h3 id="NombreUsurio"><?php echo $_GET['username']; ?></h3>
        </a>
        <nav>
            <a id="GuposBarraSuperior" class ="nav_link" href="Grupos.php?username=<?php echo urlencode($_GET['username']); ?>">Grupos</a>
            <a id="ChatBarraSuperior" class="nav_link selected" href="chat.php?username=<?php echo urlencode($usuario); ?>">Chats</a>

            <!-- <a id="InsigniasBarraSuperior" class ="nav_link" href="#">Insignias</a> -->
           <!-- <a id="TareasBarraSuperior" class ="nav_link" href="#">Tareas</a> -->
            <a class ="nav_link" href="inicio.php">
                <i class='bx bxs-log-out bx-flip-horizontal' ></i>
            </a>
        </nav>
        
    </header>

    
    <div class="chat-container">
        
        
        <div class="chat-main">
            
            <div id="chat-content">
                <!-- Contenido del chat actual -->
            </div>
            <div class="usuario-seleccionado">
                <div class="avatar ">
                <?php
    // Realizar la conexión a la base de datos
    include('conexion.php');

    // Consulta para obtener información del usuario 'geralt'
    $sqlConsulta = "SELECT ID,
    Usuario,
    Contraseña,
    Nombre,
    Apellidos,
    Telefono,
    TipoUsuario,
    ImagenBlop from  Usuarios
                    WHERE
                        usuario = '$usuario2'";

    $resultConsulta = $conn->query($sqlConsulta);

    if ($resultConsulta->num_rows > 0) {
        // Obtener el primer resultado (asumiendo que solo habrá uno)
        $row = $resultConsulta->fetch_assoc();

        // Asignar los valores a variables para usar en el HTML
        $usuaNombre2 = $row["Usuario"];
        $idd2 = $row["ID"];
        $usuaContra2 = $row["Contraseña"];
       
        $nombre2 = $row["Nombre"];
        $apellidop2 = $row["Apellidos"];
       
        $tipo2 = $row["TipoUsuario"];
        
        
        
        // ... Continuar con los demás campos ...
    } else {
        echo "No se encontraron resultados para el usuario '$usuario'.";
    }

    // Cerrar la conexión
    $conn->close();
                 
                ?>

<?php
    // Obtén el nombre de usuario de alguna manera
     $nombreUsuario = $idd2; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
     //echo $idd;
    if ($nombreUsuario) {
    // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
        $nombreUsuarioURL = urlencode($nombreUsuario);
    
       // Genera la URL de la imagen con el nombre de usuario como parámetro
      $urlImagen = "mostrar2.php?id=$nombreUsuarioURL";

       // Muestra la imagen
        echo "<img src='$urlImagen' alt=''  >";
    } else {
         echo "No se ha especificado un nombre de usuario.";
    }
    ?>
                    
                  <!--  <img src="../imagenes_usuarios/gatitochamba.jpg" alt="img" > -->
                    <span class="estado-usuario enlinea"></span>
                </div>
                <div class="cuerpo">
                    <span><?php echo $_GET['otro_username']; ?></span>
                    <span>Activo - Escribiendo...</span>
                </div>
                <div class="opciones">
                    <ul>
                        <li>
                            <button type="button"><i class='bx bxs-video bx-flip-horizontal' ></i>
                        </li>
                        <li>
                            <button type="button"><i class='bx bxs-phone' ></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-chat">


            
            <?php
                 // Realizar la consulta a la base de datos
                  include('conexion.php');  // Incluye el archivo de conexión
                  $username = $_GET['username'];
                  $sqlConsulta = "SELECT * FROM Usuarios WHERE Usuario = '$username'";

                 $resultConsulta = $conn->query($sqlConsulta);

                 if ($resultConsulta->num_rows > 0) {
                  // Obtener el primer resultado (asumiendo que solo habrá uno)
                  $row = $resultConsulta->fetch_assoc();

                  // Asignar los valores a variables para usar en el HTML
                  $ID = $row["ID"];
        
                // ... Continuar con los demás campos ...
                  }  else {
                 echo "No se encontraron resultados para el usuario '$usuario'.";
                }

                  $sql = "SELECT Contenido, FechaEnvio, RemitenteID, ID
                  FROM Mensajes
                  WHERE (RemitenteID = $ID AND DestinatarioID = $ID2)
                     OR (RemitenteID = $ID2 AND DestinatarioID = $ID)
                  ORDER BY FechaEnvio asc";
                 $result = $conn->query($sql);
                ?>

                 <?php
                  // Verificar si se obtuvieron resultados
                 if ($result->num_rows > 0) {
                 // Iterar sobre los resultados y generar las opciones del select
                  while ($row = $result->fetch_assoc()) {
                  //echo "<option value='" . $row["Id"] . "'>" . $row["Nombre"] . "</option>";
                  if($row["RemitenteID"] == $ID){ //USUARIO LOGG DERECHA

                    $sql1 = "SELECT 
                        CONCAT(
                        TIMESTAMPDIFF(HOUR, FechaEnvio, NOW()), ' horas ',
                        MOD(TIMESTAMPDIFF(MINUTE, FechaEnvio, NOW()), 60), ' minutos'
                          ) AS diferencia_tiempo 
                          FROM Mensajes 
                           WHERE ID = " . $row["ID"];

                    $result1 = $conn->query($sql1);
                    
                    if ($result1->num_rows > 0) {
                        $row1 = $result1->fetch_assoc();
                        $diferenciaTiempo = $row1['diferencia_tiempo'];
                    
                        // Formatea la diferencia de tiempo según tus necesidades
                        // Por ejemplo, si quieres mostrar "hace X minutos"
                        
                        //echo "La diferencia de tiempo es: $diferenciaFormateada";
                    } else {
                       // echo "No se encontraron resultados.";
                    }
                                        
                    echo '
                    <div class="mensaje left">
                    <div class="cuerpo">
                         <img src="http://localhost/multimedia/png/user-foto-3.png" alt=""> 
                        <div class="texto">
                        '. $row["Contenido"] .'
                            <span class="tiempo">
                                <i class= bx bx-time-five ></i>
                                '.$diferenciaTiempo.'
                                
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="avatar">';

                    
    // Obtén el nombre de usuario de alguna manera
     $nombreUsuario = $idd; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
     //echo $idd;
    if ($nombreUsuario) {
    // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
        $nombreUsuarioURL = urlencode($nombreUsuario);
    
       // Genera la URL de la imagen con el nombre de usuario como parámetro
      $urlImagen = "mostrar2.php?id=$nombreUsuarioURL";

       // Muestra la imagen
        echo "<img src='$urlImagen' alt=''  >";
    } else {
         echo "No se ha especificado un nombre de usuario.";
    }
  

                       // <img src="../img/user.jpeg" alt="img">
                       echo '
                    </div>
                </div>';

                  }if($row["RemitenteID"] == $ID2){ //USUARIO ESCRITO IZQUIERDA


                    $sql1 = "SELECT 
                        CONCAT(
                        TIMESTAMPDIFF(HOUR, FechaEnvio, NOW()), ' horas ',
                        MOD(TIMESTAMPDIFF(MINUTE, FechaEnvio, NOW()), 60), ' minutos'
                          ) AS diferencia_tiempo 
                          FROM Mensajes 
                           WHERE ID = " . $row["ID"];

                    $result1 = $conn->query($sql1);
                    
                    if ($result1->num_rows > 0) {
                        $row1 = $result1->fetch_assoc();
                        $diferenciaTiempo = $row1['diferencia_tiempo'];
                    
                        // Formatea la diferencia de tiempo según tus necesidades
                        // Por ejemplo, si quieres mostrar "hace X minutos"
                        
                        //echo "La diferencia de tiempo es: $diferenciaFormateada";
                    } else {
                       // echo "No se encontraron resultados.";
                    }
                    
                    echo '
                    <div class="mensaje">
                    <div class="avatar">';
                     // Obtén el nombre de usuario de alguna manera
     $nombreUsuario = $idd2; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
     //echo $idd;
    if ($nombreUsuario) {
    // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
        $nombreUsuarioURL = urlencode($nombreUsuario);
    
       // Genera la URL de la imagen con el nombre de usuario como parámetro
      $urlImagen = "mostrar2.php?id=$nombreUsuarioURL";

       // Muestra la imagen
        echo "<img src='$urlImagen' alt=''  >";
    } else {
         echo "No se ha especificado un nombre de usuario.";
    }
                        //<img src="../imagenes_usuarios/gatitochamba.jpg" alt="img">
                        echo '</div>
                    <div class="cuerpo">
                        
                        <div class="texto">
                            '. $row["Contenido"] .'
                            
                            <span class="tiempo">
                                <i class= bx bx-time-five ></i>
                                '.$diferenciaTiempo.'
                            </span>
                        </div>

                    </div>
                </div> ';
                    
                  }



                  
                  

                  }
                }else {
                   //echo "<option value=''>No hay opciones disponibles</option>";
                }
                ?>



                <!--
                <div class="mensaje">
                    <div class="avatar">
                        <img src="../imagenes_usuarios/gatitochamba.jpg" alt="img">
                    </div>
                    <div class="cuerpo">
                        -- <img src="http://localhost/multimedia/png/user-foto-3.png" alt=""> 
                        <div class="texto">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                            <span class="tiempo">
                                <i class='bx bx-time-five' ></i>
                                Hace 5 min
                            </span>
                        </div>

                    </div>
                </div>
                 derecha 
                <div class="mensaje left">
                    <div class="cuerpo">
                         ---<img src="http://localhost/multimedia/png/user-foto-3.png" alt=""> 
                        <div class="texto">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                            <span class="tiempo">
                                <i class='bx bx-time-five' ></i>
                                Hace 6 min
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="avatar">
                        <img src="../img/user.jpeg" alt="img">
                    </div>
                </div>

                -->



                <script>

function enviarMensaje() {
const mensaje = $('#mensaje').val(); // Obtenemos el contenido del textarea
const usuario = '<?php echo $usuario; ?>';
const usuario2 = '<?php echo $usuario2; ?>';
const ID2 = '<?php echo $ID2; ?>';

// Realizamos una solicitud AJAX para enviar el mensaje al otro PHP
$.ajax({
url: 'enviarm.php', // Reemplaza con la URL de tu PHP
type: 'POST',
data: {
    mensaje: mensaje,
    usuario: usuario,
    usuario2: usuario2
    ID2: ID2
},
success: function(response) {
    console.log('Mensaje enviado correctamente:', response);
    // Aquí puedes realizar acciones adicionales si es necesario
},
error: function(error) {
    console.error('Error al enviar el mensaje:', error);
}
});
}
</script>
                <div class="panel-escritura">
                    <form class="textarea" action="enviarm.php" method="post">
                    <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
                    <input type="hidden" name="usuario2" value="<?php echo $usuario2; ?>">
                    <input type="hidden" name="ID2" value="<?php echo $ID2; ?>">
                        <div class="opcines">
                            <button type="button">
                                <i class='bx bx-file-blank' style="color: black;"></i>
                                <label for="file"></label>
                                <input type="file" id="file">
                            </button>
                            <button type="button">
                                <i class='bx bx-image' style="color: black;" ></i>
                                <label for="img"></label>
                                <input type="file" id="img">
                            </button>
                        </div>
                        <textarea id="mensaje" name="mensaje" placeholder="Escribir mensaje"></textarea>
                       
                        <button type="submit" class="enviar"> <!-- Agregamos onclick -->
                         <i class='bx bxs-send'></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>




   
    
    
</body>
</html>
