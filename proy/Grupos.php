<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos</title>

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
</head>
<body>
<?php
                 // Realizar la consulta a la base de datos
                  
                  $username = $_GET['username'];

                  
                ?>

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

            <!-- <img src="../img/user.jpeg" alt = "" > -->
            <h3 id="NombreUsurio"><?php echo $_GET['username'], " ", $tipo; ?></h3>
        </a>
        <nav>
            <a id="GuposBarraSuperior" class ="nav_link" href="#">Grupos</a>
            <a id="ChatBarraSuperior" class ="nav_link selected " href="chat.php?username=<?php echo $_GET['username']; ?>">Chats</a>
             <!-- <a id="InsigniasBarraSuperior" class ="nav_link" href="#">Insignias</a> -->
            <!-- <a id="TareasBarraSuperior" class ="nav_link" href="#">Tareas</a> -->
            <a class ="nav_link" href="inicio.php">
                <i class='bx bxs-log-out bx-flip-horizontal' ></i>
            </a>
        </nav>
        
    </header>

    
    <div class="chat-container">
        
        <div class="chat-sidebar">
                
                <div class="usuario-seleccionado">
                    <div class="cuerpo">
                        <!-- <span>Grupos</span> -->
                        <!-- <span>Activo - Escribiendo...</span> -->
                    </div>
                    <div class="opciones">
                        <ul> 
                            <li>
                                <button type="button" onclick="mostrarVentanaEmergenteCrearGrupos()" style="width: 90px; border-radius: 10% ;"> <h6>Crear Grupo</h6><i class='bx bx-plus'></i>
                            </button>
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

                  $sql = "SELECT Grupo.ID AS IDGrupo, Grupo.Nombre AS NombreGrupo
                  FROM Grupo
                  INNER JOIN MiembrosGrupo ON Grupo.ID = MiembrosGrupo.GrupoID
                  INNER JOIN Usuarios ON MiembrosGrupo.UsuarioID = Usuarios.ID
                  WHERE Usuarios.Usuario ='$username'";
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
                  echo '<li class="chat-list-item" id="chat' . $row["IDGrupo"] . '">
                    
                    
                    
                  <div class="usuario-info-chat">';
                 
                  // Obtén el nombre de usuario de alguna manera
                   $nombreUsuario = $row["IDGrupo"]; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
                  // echo $nombreUsuario;
                  if ($nombreUsuario) {
                  // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
                      $nombreUsuarioURL = urlencode($nombreUsuario);
                  
                     // Genera la URL de la imagen con el nombre de usuario como parámetro
                    $urlImagen = "mostrar3.php?id=$nombreUsuarioURL";
              
                     // Muestra la imagen
                      echo "<img src='$urlImagen' alt='Imagen desde la base de datos'  class='chat-icon'>";
                  } else {
                       echo "No se ha especificado un nombre de usuario.";
                  }
                  

                      //<img src="../img_grupos/cruzcruz.jpg" alt="Chat 1" class="chat-icon">
                      echo '<!-- <span class="estado-usuario enlinea"></span> -->
                  <!-- <i class="bx bxs-group" ></i> -->

                  </div>
                  <span> ' . $row["NombreGrupo"] . '</span> 
                  
                   </li>';
                 
                  }
                }else {
                   //echo "<option value=''>No hay opciones disponibles</option>";
                }
                ?>


               
            </ul>




            <div id="Grupos_list_container">
                <!-- Aquí se mostrará la lista de grupos -->
            </div>
            
        </div>
        <div class="chat-main" id="grupo1">
            
            <div id="chat-content">
                <!-- Contenido del chat actual -->
            </div>
            
        </div>

        
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

            // Obtén el nombre de usuario
            const username = this.querySelector('span').innerText;

            window.location.href = 'Grupos_chat.php?id_grupo=' + id + '&grupo=' + username + '&username=<?php echo $username; ?>';

           

          
    

            
           
        });
    });

      
    </script>


<!-- ventana emergente  agregar miembros-->
<div id="miVentanaEmergente" class="popup">
    <div class="popup-content" >
        <button type="button" class="close-button" onclick="cerrarVentanaEmergente()">&times;</button>
        
        <form>
            <div class="chat-main">
            
                <div id="chat-content">
                    <!-- Contenido del chat actual -->
                </div>
                <div class="usuario-seleccionado">
                    <div class="input-buscar">
                        <input type="search" placeholder="Buscar usuario">
                        <button class="button-search"><i class='bx bx-search-alt-2'></i></button>
                    </div>
                </div>
                <div class="panel-chat">
                <ul class="chat-list">
                <li class="chat-list-item" id="chat1" onclick="mostrarInfoUsuario('chat1')">
                    
                    
                    
                    <div class="usuario-info-chat">
                    <img src="../imagenes_usuarios/gatitochamba.jpg" alt="Chat 1" class="chat-icon_V2">
                    </div>
                    <span> gatito chamba</span> 
                    
                </li>
                <li class="chat-list-item" id="chat2" onclick="mostrarInfoUsuario('chat2')">
                    <div class="usuario-info-chat">
                        <img src="../imagenes_usuarios/gatoGuitarra.jpg" alt="Chat 2" class="chat-icon_V2">
                        <!-- <span class="estado-usuario enlinea"></span> -->
                        
                    </div>
                    <span>Gato guitarra</span>
                </li>
                <li class="chat-list-item" id="chat3" onclick="mostrarInfoUsuario('chat3')">
                    <div class="usuario-info-chat">
                        <img src="../imagenes_usuarios/bob.jpg" alt="Chat 3" class="chat-icon_V2">
                    
                        
                    </div>
                    <span>Bob esponja</span>
                    
                </li>
                </ul>

    
                </div>
                <div class="info-usuario-seleccionado">

                    
                </div>
            </div>

            <button type="button" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>
        
    </div>
</div>
<!-- ventana emergente  crear Grupo-->
<div id="miVentanaEmergenteCrearGrupos" class="popup">
    <div class="popup-content">
        <button type="button" class="close-button" onclick="cerrarVentanaEmergenteCrearGrupos()">&times;</button>

        <form action="crear_grupo.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="usuario" value="<?php echo $_GET['username']; ?>">
            <div class="chat-main">
                <div class="form-group">
                    <label for="nombreGrupo">Nombre del Grupo:</label>
                    <input type="text" id="nombreGrupo" name="nombreGrupo" placeholder="Ingrese el nombre del grupo" required>
                </div>
                <div class="form-group">
                    <label for="descripcionGrupo">Descripción del Grupo:</label>
                    <textarea id="descripcionGrupo" name="descripcionGrupo" rows="4" placeholder="Ingrese la descripción del grupo" required></textarea>
                </div>
                <div class="form-group">
                    <label for="fotoGrupo">Foto del Grupo:</label>
                    <input type="file" id="fotoGrupo" name="fotoGrupo" accept="image/*" onchange="mostrarImagen()">

                    
                </div>
                <div class="form-group">
                    <img id="imagenMostrada" src="" alt="Imagen del grupo" style="max-width: 100%; display: none;">
                </div>
            </div>

            <button type="submit" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>

    </div>
</div>
<!-- ventana emergente  miembros-->
<div id="miVentanaEmergenteMiembros" class="popup">
    <div class="popup-content" >
        <button type="button" class="close-button" onclick="cerrarVentanaEmergenteMiembros()">&times;</button>
        
        <form>
            <div class="chat-main">
            


                <div class="panel-chat">
                <ul class="chat-list">
                <li class="chat-list-item" id="chat1" onclick="mostrarInfoUsuario('chat1')">
                    
                    
                    
                    <div class="usuario-info-chat" >
                    <img src="../imagenes_usuarios/gatitochamba.jpg" alt="Chat 1" class="chat-icon_V2">
                    </div>
                    <span> gatito chamba</span> 
                    
                    
                </li>
                <li class="chat-list-item" id="chat2" onclick="mostrarInfoUsuario('chat2')">
                    <div class="usuario-info-chat">
                        <img src="../imagenes_usuarios/gatoGuitarra.jpg" alt="Chat 2" class="chat-icon_V2">
                        <!-- <span class="estado-usuario enlinea"></span> -->
                        
                    </div>
                    <span>Gato guitarra</span>
                </li>
                <li class="chat-list-item" id="chat3" onclick="mostrarInfoUsuario('chat3')">
                    <div class="usuario-info-chat">
                        <img src="/imagenes_usuarios/bob.jpg" alt="Chat 3" class="chat-icon_V2">
                    
                        
                    </div>
                    <span>Bob esponja</span>
                    
                </li>
                </ul>

    
                </div>

            </div>

            <button type="button" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>
        
    </div>
</div>
    
   

    
  
    
    <!-- <script src="script.js"></script> -->
</body>
</html>
