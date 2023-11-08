<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>

    <!-- <link rel="stylesheet" type="text/css" href="MyStyle.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/chatstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/Grupos.css">
    <link rel="stylesheet" type="text/css" href="../css/ventanasEmegentes/VE_Miembros.css">
    <!-- icono de la pagina -->
    <link rel="icon" href="../icon/bisonte.ico" type="image/x-icon">



    <link rel="stylesheet" type="text/css" href="../css/barraSuperior.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <script src="/js/barraSuperior.js"></script> -->
    <script src="../js/VentanaEmergente.js"></script>
    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //   // Selecciona el enlace por su ID
        //   var registroLink = document.getElementById("registroLink");
        
        //   // Agrega un evento de clic al enlace
        //   registroLink.addEventListener("click", function (event) {
        //     event.preventDefault(); // Evita el comportamiento predeterminado del enlace
        //     window.location.href = "inicio.html"; // Redirige a otro.html
        //   });
        // });
    </script>
    <style>
        /* Estilos básicos para el chat y la bandeja de chats */
        /* body {font-family: Arial, Helvetica, sans-serif;} */
       
        /*
        body {
            font-family: Arial, sans-serif;
        }
        */
        /* html{
  background: var(--gris-bisonte);
background: radial-gradient(circle, var(--azul-bisonte) 0%, var(--rojo-bisonte) 100%);
} */


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

        <?php
                 // Realizar la consulta a la base de datos
                  
                  $username = $_GET['username'];
                  $id_grupo = $_GET['id_grupo'];//subgrupo
                  $grupo = $_GET['grupo'];//subgrupo
                  $id_grupo2 = $_GET['idgrupo2']; //grupo origen

                  
                ?>

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

    </style>
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
        echo "<img src='$urlImagen' alt=''  >";
    } else {
         echo "No se ha especificado un nombre de usuario.";
    }
    ?>
            <h3 id="NombreUsurio"><?php echo $username; ?></h3>
        </a>
        <nav>
            <a id="GuposBarraSuperior" class ="nav_link" href="Grupos.php?username=<?php echo urlencode($usuaNombre); ?>">Grupos</a>
            <a id="ChatBarraSuperior" class ="nav_link selected " href="chat.php?username=<?php echo urlencode($usuaNombre); ?>">Chats</a>
            <!-- <a id="InsigniasBarraSuperior" class ="nav_link" href="#">Insignias</a> -->
           <!-- <a id="TareasBarraSuperior" class ="nav_link" href="#">Tareas</a> -->
            <a class ="nav_link" href="#">
                <i class='bx bxs-log-out bx-flip-horizontal' ></i>
            </a>
        </nav>
        
    </header>

    
    <div class="chat-container">
        
        <div class="chat-sidebar">
                
                <div class="usuario-seleccionado">
                    
                    
                        <div class="avatar ">
                        <?php
                            // Obtén el nombre de usuario de alguna manera
     $nombreUsuario = $id_grupo; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
     //echo $idd;
    if ($nombreUsuario) {
    // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
        $nombreUsuarioURL = urlencode($nombreUsuario);
    
       // Genera la URL de la imagen con el nombre de usuario como parámetro
      $urlImagen = "mostrar4.php?id=$nombreUsuarioURL";

       // Muestra la imagen
        echo "<img style='border-radius: 50%; width: 55px;' class='tamañoImagengrupoPanel' class='tamañoImagengrupoPanel' src='$urlImagen' alt=''  >";
    } else {
         echo "No se ha especificado un nombre de usuario.";
    }
    ?>
                            
                            <!--<img style="border-radius: 50%; width: 55px;" class="tamañoImagengrupoPanel" src="../img_grupos/gatitoPuño.jpg" alt="img"> -->
                            <!-- <i class='bx bxs-group'   ></i> -->
                        </div>
                        <div class="cuerpo">
                            <span><?php echo $grupo; ?></span>
                            <!-- <span>Activo - Escribiendo...</span> -->
                        </div>
                        <div class="opciones">
                            <ul> 
                                <li>
                                    <?php  include('conexion.php');  // Incluye el archivo de conexión
                  if ($conn->connect_error) {
                    die("Error de conexión a la base de datos: " . $conn->connect_error);
                }
                  $username = $_GET['username'];

                  $sqlSelectUsuario = "SELECT  ID ,
                  Nombre ,
                  Descripcion  ,
                  Fecha_creacion  ,
                  Creador_ID ,
                  ImagenBlop from grupo
                  WHERE
                  Creador_ID = $idd";
              
                  $result2 = $conn->query($sqlSelectUsuario);
              
                  if ($result2->num_rows > 0) {
                    echo"<button type='button' onclick='mostrarVentanaEmergenteTareas()' style='width: 110px; border-radius: 10% ;'> <h6>Crear Tarea</h6><i class='bx bx-plus'></i>
                    </button>";};?>
                                    
                                </li> 
        
                            </ul>
                        </div>

                </div>

            <!-- <nav id="Menu">
                <div id="ChatMenu">
                    <a class ="nav_link" href="#">Chat</a>
                </div>     -->
                <!-- aqui parece el menu segun hemos selecionado en la barra superior 
                
            </nav>-->

            <!-- <h3>  <img src="/imagenes_usuarios/patricio.jpg" alt="Chat 1" class="chat-icon">patricio 
                <span class="regs"> <a href="#" id="registroLink">Cerrar sesión</a></span></h3>
            <h2>Bandeja de Chats</h2> -->
            
            <ul class="chat-list">

            <?php
                 // Realizar la consulta a la base de datos
                  include('conexion.php');  // Incluye el archivo de conexión
                  if ($conn->connect_error) {
                    die("Error de conexión a la base de datos: " . $conn->connect_error);
                }
                  $username = $_GET['username'];

                  $sqlSelectUsuario = "SELECT  ID ,
                  Nombre ,
                  Descripcion  ,
                  Fecha_creacion  ,
                  Creador_ID ,
                  ImagenBlop from grupo
                  WHERE
                  Creador_ID = $idd";
              
                  $result2 = $conn->query($sqlSelectUsuario);
              
                  if ($result2->num_rows > 0) {
                    $sql = "SELECT  ID ,
                  Nombre ,
                  SubGrupo_ID ,
                  Fecha_creacion ,
                  Descripcion,
                  Estado  from tareas where subgrupo_ID = $id_grupo and Estado = 1";
                 $result = $conn->query($sql);

                 if (!$result) {
                    die("Error en la consulta: " . $conn->error);
                }
                

                
                  // Verificar si se obtuvieron resultados    Maestro
                 if ($result->num_rows > 0) {
                    ///$row = $resultConsulta->fetch_assoc();
                 // Iterar sobre los resultados y generar las opciones del select
                  while ($row = $result->fetch_assoc()) {
                  //echo "<option value='" . $row["Id"] . "'>" . $row["Nombre"] . "</option>";
                  echo '<li class="chat-list-item" data-activity="" id="chat' . $row["ID"] . '">
                    
                    
                    
                  <div class="usuario-info-chat">';
                 
                  
                  

                      //<img src="../img_grupos/cruzcruz.jpg" alt="Chat 1" class="chat-icon">
                      echo '<!-- <span class="estado-usuario enlinea"></span> -->
                  <!-- <i class="bx bxs-group" ></i> -->

                  </div>
                  <span> Maestro ' . $row["Nombre"] . '</span> 
                  
                   </li>';
                 
                  }
                }else {
                   //echo "<option value=''>No hay opciones disponibles</option>";
                }

            }else{ //alumno
                $sql = "SELECT T.ID, T.Nombre, T.Descripcion, T.Fecha_creacion
                FROM Tareas AS T
                LEFT JOIN TareasSubGrupos AS TS ON T.ID = TS.Id_Tarea AND TS.Id_Usuario = $idd
                WHERE T.SubGrupo_ID = $id_grupo AND TS.ID IS NULL AND T.estado = 1";
               $result = $conn->query($sql);

               if (!$result) {
                  die("Error en la consulta: " . $conn->error);
              }
              

              
                // Verificar si se obtuvieron resultados
               if ($result->num_rows > 0) {
                  ///$row = $resultConsulta->fetch_assoc();
               // Iterar sobre los resultados y generar las opciones del select
                while ($row = $result->fetch_assoc()) {
                //echo "<option value='" . $row["Id"] . "'>" . $row["Nombre"] . "</option>";
                echo '<li class="chat-list-item" data-activity="" id="chat' . $row["ID"] . '">
                  
                  
                  
                <div class="usuario-info-chat">';
               
                
                

                    //<img src="../img_grupos/cruzcruz.jpg" alt="Chat 1" class="chat-icon">
                    echo '<!-- <span class="estado-usuario enlinea"></span> -->
                <!-- <i class="bx bxs-group" ></i> -->

                </div>
                <span> Estudiante ' . $row["Nombre"] . '</span> 
                
                 </li>';
               
                }
              }else {
                 //echo "<option value=''>No hay opciones disponibles</option>";
              }
            }
                      

                  
                ?>



                
            </ul>




           
            
        </div>
        <script>
const chatItems = document.querySelectorAll('.chat-list-item');

// Agrega un evento de clic a cada elemento
chatItems.forEach(item => {
    var chatContent = document.getElementById("chat-content");
    function cambiarChat(contenido) {
             // Agregar el contenido al chat actual
             chatContent.innerHTML = contenido;
         }

    item.addEventListener('click', function() {
        var chatContent = document.getElementById("chat-content");
        // Obtén el ID del elemento
        const id = item.id.replace('chat', '');
        const grupo = "<?php echo $id_grupo; ?>";
        const grupon = "<?php echo $grupo; ?>";
        const id_usuario = "<?php echo $idd; ?>";
        const usuario = "<?php echo $username; ?>";
        const grupo_o = "<?php echo $id_grupo2; ?>";

        


        // Obtén el nombre de usuario
        const username = this.querySelector('span').innerText;

       
        function cambiarChat(contenido) {
                // Agregar el contenido al chat actual
                chatContent.innerHTML = contenido;
            }

            var url = "selecTarea.php?id=" + id + "&id_grupo=" + grupo + "&grupon="+ grupon + "&id_usuario=" + id_usuario+ "&usuario=" + usuario+ "&id_grupo2=" + grupo_o;


            var xhttp = new XMLHttpRequest();

            // Configurar la solicitud AJAX
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // La respuesta de PHP se almacena en this.responseText
                   // var variablePHP = this.responseText;
                    document.getElementById("chat-content").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", url, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // Enviar la variable al servidor
            xhttp.send("variablePHP=" + id);

    });
});

            
            
</script>
        <div class="chat-main" >
        <div id="chat-content">
                <!-- Contenido del chat actual -->
         </div>
            

            
        </div>

        
    </div>


<!-- ventana emergente  crear TAREA-->
<div id="miVentanaEmergenteTareas" class="popup">
    <div class="popup-content">
        <button type="button" class="close-button" onclick="cerrarVentanaEmergenteTareas()">&times;</button>

        <form  action="crear_tarea.php" method="post" enctype="multipart/form-data">
            <div class="chat-main">

            <input type="hidden" name="id_grupo" value="<?php echo  $id_grupo; ?>">
            <input type="hidden" name="grupo" value="<?php echo $grupo; ?>">
            <input type="hidden" name="grupo_o" value="<?php echo $id_grupo2; ?>">
            <input type="hidden" name="usuario" value="<?php echo $username; ?>">
            <input type="hidden" name="id_usuario" value="<?php echo $idd; ?>">
                <div class="form-group">
                    <label for="nombreGrupo">Nombre de la Tarea:</label>
                    <input type="text" id="nombreGrupo" name="nombreGrupo" placeholder="Ingrese el Nombre de la Tarea" required>
                </div>
                <div class="form-group">
                    <label for="descripcionGrupo">Descripción de la Tarea:</label>
                    <textarea id="descripcionGrupo" name="descripcionGrupo" rows="4" placeholder="Ingrese la Descripción de la Tarea" required></textarea>
                </div>
                <!-- <div class="form-group">
                    <label for="fotoGrupo">Foto del SubGrupo:</label>
                    <input type="file" id="fotoGrupo" name="fotoGrupo" accept="image/*" onchange="mostrarImagen()">

                    
                </div>
                <div class="form-group">
                    <img id="imagenMostrada" src="" alt="Imagen del grupo" style="max-width: 100%; display: none;">
                </div> -->
            </div>

            <button type="submit" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>

    </div>
</div>


    <!-- ventana emergente  AsignarInsignia-->
<div id="miVentanaEmergenteAsignarInsignia" class="popup">
    <div class="popup-content" >
        <button type="button" class="close-button" onclick="cerrarVentanaEmergenteAsignarInsignia()">&times;</button>
        
        <form>
            <div class="chat-main">
            


                <table border="1">
                    <tbody><tr>
                        <th>Nombre</th>
                        <th> Entregada<i class="bx bx-checkbox-checked"></i></th>
                        <th>Sin Entregar <i class="bx bx-task-x"></i></th>
                        <th>Insignia <i class="bx bxs-trophy"></i></th>
                    </tr>
                    <tr>
                        <td>                    
                            <div class="usuario-info-chat">
                            <img src="../imagenes_usuarios/gatoGuitarra.jpg" alt="Chat 2" class="chat-icon">
                            <span class="estado-usuario enlinea"></span>
                            </div>
                                <span>Gato guitarra</span>
                        </td>
                        <td><i class="bx bx-checkbox-checked"></i></td>
                        <td> </td>
                        <td><i class="bx bxs-trophy"></i></td>
                    </tr>
                    <tr>
                        <td>                            
                            <div class="usuario-info-chat">
                            <img src="../imagenes_usuarios/gatitochamba.jpg" alt="Chat 2" class="chat-icon">
                            <span class="estado-usuario enlinea"></span>
                            </div>
                                <span>gatitochamba</span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>                            
                            <div class="usuario-info-chat">
                            <img src="../imagenes_usuarios/bob.jpg" alt="Chat 2" class="chat-icon">
                            <span class="estado-usuario enlinea"></span>
                            </div>
                                <span>bob</span>
                        </td>
                        <td></td>
                        <td><i class="bx bx-task-x"></i></td>
                        <td></td>
                    </tr>
                </tbody></table>

            </div>

            <button type="button" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>
        
    </div>
</div>
    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //     // Obtener referencias a los elementos de la bandeja de chats
        //     var chat1 = document.getElementById("chat1");
        //     var chat2 = document.getElementById("chat2");
        //     var chat3 = document.getElementById("chat3");
    
        //     // Obtener referencia al elemento de contenido del chat actual
        //     var chatContent = document.getElementById("chat-content");
    
        //     // Función para cambiar el contenido del chat actual
        //     function cambiarChat(contenido) {
        //         // Agregar el contenido al chat actual
        //         chatContent.innerHTML = contenido;
        //     }
    
        //     // Agregar eventos de clic a los elementos de la bandeja de chats
        //     chat1.addEventListener("click", function () {
        //         var contenidoChat1 = `
        //             <h2>Chat Actual</h2>
        //             <div class="chat-message"><img src="/imagenes_usuarios/gatitochamba.jpg" alt="Chat 1" class="chat-icon">Gato chamba: ¡Hola!</div>
        //             <div class="chat-message">Tú: ¿Cómo estás?</div>
        //             <div class="chat-message"><img src="/imagenes_usuarios/gatitochamba.jpg" alt="Chat 1" class="chat-icon">Gato chamba: Bien, gracias. ¿Y tú?</div>
        //             <div class="chat-message">Tú: Muy bien, gracias por preguntar.</div>
        //             <input type="text" class="chat-input" placeholder="Escribe tu mensaje aquí">
        //             <button class="send-button">Enviar</button>
        //         `;
        //         cambiarChat(contenidoChat1);
        //     });
    
        //     chat2.addEventListener("click", function () {
        //         var contenidoChat2 = `
        //             <h2>Chat Actual</h2>
        //             <div class="chat-message"> </img src="imagenes_usuarios/gatoGuitarra.jpg" alt="Chat 2" class="chat-icon">Gato guitarra: Hola, soy el gato guitarra.</div>
        //             <div class="chat-message">Tú: ¿Cómo puedo ayudarte?</div>
        //             <input type="text" class="chat-input" placeholder="Escribe tu mensaje aquí">
        //             <button class="send-button">Enviar</button>
        //         `;
        //         cambiarChat(contenidoChat2);
        //     });
    
        //     chat3.addEventListener("click", function () {
        //         var contenidoChat3 = `
        //             <h2>Chat Actual</h2>
        //             <div class="chat-message"> <img src="/imagenes_usuarios/bob.jpg" alt="Chat 3" class="chat-icon">Bob esponja: ¡Hola soy bob esponja!</div>
        //             <input type="text" class="chat-input" placeholder="Escribe tu mensaje aquí">
        //             <button class="send-button">Enviar</button>
        //         `;
        //         cambiarChat(contenidoChat3);
        //     });
        // });
    </script>
    
    <!-- <script src="script.js"></script> -->
</body>
</html>
