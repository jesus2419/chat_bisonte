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

        
        .chat-list-item2 {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
        }
        .chat-list-item2:hover {
           background-color
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
                  $id_grupo = $_GET['id_grupo'];
                  $grupo = $_GET['grupo'];

                  
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
        echo "<img src='$urlImagen' alt=''  >";
    } else {
         echo "No se ha especificado un nombre de usuario.";
    }
    ?>
            <h3 id="NombreUsurio"><?php echo $username; ?></h3>
        </a>
        <nav>
            <a id="GuposBarraSuperior" class ="nav_link" href="Grupos.php?username=<?php echo urlencode($_GET['username']); ?>">Grupos</a>
            <a id="ChatBarraSuperior" class ="nav_link selected " href="chat.php?username=<?php echo urlencode($usuario); ?>">Chats</a>
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
                    
                        <div class="avatar ">

                        <?php
    // Obtén el nombre de usuario de alguna manera
     $nombreUsuario = $id_grupo; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
     //echo $idd;
    if ($nombreUsuario) {
    // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
        $nombreUsuarioURL = urlencode($nombreUsuario);
    
       // Genera la URL de la imagen con el nombre de usuario como parámetro
      $urlImagen = "mostrar3.php?id=$nombreUsuarioURL";

       // Muestra la imagen
        echo "<img style='border-radius: 50%; width: 55px;' class='tamañoImagengrupoPanel' src='$urlImagen' alt=''  >";
    } else {
         echo "No se ha especificado un nombre de usuario.";
    }
    ?>
                            
                        <!--
                            <img style="border-radius: 50%; width: 55px;" class="tamañoImagengrupoPanel" src="../img_grupos/gatitoPuño.jpg" alt="img">
                        -->
                            <!-- <i class='bx bxs-group'   ></i> -->
                        </div>
                        <div class="cuerpo">
                            <span><?php echo $grupo; ?></span>
                            <!-- <span>Activo - Escribiendo...</span> -->
                        </div>
                        <div class="opciones">
                            <ul> 
                                <li>
                                    <button type="button" onclick="mostrarVentanaEmergenteSubCrearGrupos()" style="width: 110px; border-radius: 10% ;"> <h6>Crear SubGrupo</h6><i class='bx bx-plus'></i>
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

                  $sql = "SELECT S.ID, S.Nombre, S.GrupoPrincipal_ID, S.Fecha_creacion, S.Descripcion, S.Imagen
                  FROM Subgrupo AS S
                  INNER JOIN MiembrosSubgrupo AS MS ON S.ID = MS.SubgrupoID
                  WHERE MS.UsuarioID = $idd AND S.GrupoPrincipal_ID = $id_grupo";
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
                  echo '<li class="chat-list-item" id="chat' . $row["ID"] . '">
                    
                    
                    
                  <div class="usuario-info-chat">';
                 
                  // Obtén el nombre de usuario de alguna manera
                   $nombreUsuario = $row["ID"]; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
                  // echo $nombreUsuario;
                  if ($nombreUsuario) {
                  // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
                      $nombreUsuarioURL = urlencode($nombreUsuario);
                  
                     // Genera la URL de la imagen con el nombre de usuario como parámetro
                    $urlImagen = "mostrar4.php?id=$nombreUsuarioURL";
              
                     // Muestra la imagen
                      echo "<img src='$urlImagen' alt='Imagen desde la base de datos'  class='chat-icon'>";
                  } else {
                       echo "No se ha especificado un nombre de usuario.";
                  }
                  

                      //<img src="../img_grupos/cruzcruz.jpg" alt="Chat 1" class="chat-icon">
                      echo '<!-- <span class="estado-usuario enlinea"></span> -->
                  <!-- <i class="bx bxs-group" ></i> -->

                  </div>
                  <span> ' . $row["Nombre"] . '</span> 
                  
                   </li>';
                 
                  }
                }else {
                   //echo "<option value=''>No hay opciones disponibles</option>";
                }
                ?>

            </ul>


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

            window.location.href = 'SubGrupos_chat.php?id_grupo=' + id + '&grupo=' + username + '&username=<?php echo $username; ?>'+ '&idgrupo2=<?php echo $id_grupo; ?>';

           

          
    

            
           
        });
    });

      
    </script>




            <div id="Grupos_list_container">
                <!-- Aquí se mostrará la lista de grupos -->
            </div>
            
        </div>
        
        <div class="chat-main">
            
            <div id="chat-content">
                <!-- Contenido del chat actual -->
            </div>
            <div class="usuario-seleccionado">
                <div class="avatar "><?php
    // Obtén el nombre de usuario de alguna manera
     $nombreUsuario = $id_grupo; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
     //echo $idd;
    if ($nombreUsuario) {
    // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
        $nombreUsuarioURL = urlencode($nombreUsuario);
    
       // Genera la URL de la imagen con el nombre de usuario como parámetro
      $urlImagen = "mostrar3.php?id=$nombreUsuarioURL";

       // Muestra la imagen
        echo "<img class='tamañoImagengrupoPanel' src='$urlImagen' alt=''  >";
    } else {
         echo "No se ha especificado un nombre de usuario.";
    }
    ?>

                    <!--<img class="tamañoImagengrupoPanel" src="../img_grupos/gatitoPuño.jpg" alt="img" > -->
                    <!-- <i class='bx bxs-group'   ></i> -->
                </div>
                <div class="cuerpo">
                    <span><?php echo $grupo; ?></span>
                    <!-- <span>Activo - Escribiendo...</span> -->
                </div>
                <div class="opciones">
                    <ul> 
                        
                        <li >
                            <button onclick="mostrarVentanaEmergente()"  type="button"  title="Agregar Membros" ><i class='bx bxs-user-plus'></i>
                                
                        </li>
                        <li >
                            <button onclick="mostrarVentanaEmergenteMiembros()" type="button"  title="Miembros" ><i class='bx bx-user'></i>
                        </li>  
                       
                        <li >
                            <!-- <button type="button"  title="SubGrupos"  ></button><i class='bx bx-list-ul'></i> -->
                                
                                    
                                    <a id="TareasBarraSuperior" class ="nav_link" href="../php/SubGrupos.html">
                                        <button style="width: 110px; border-radius:0% ;" type="button"  title="SubGrupos">SubGrupos
                                        <i class='bx bx-list-ul'></i>
                                        </button>
                                            
                                    
                                    </a> 
                                
                        </li> 
                        <li >
                            <button type="button" style="background-color: rgba(255, 0, 0, 0.534);"#007bff title="Eliminar Grupo" ><i class='bx bxs-trash'></i>
                        </li> 
                    </ul>
                </div>
            </div>
            <div class="panel-chat">
                
                <div id="miembros">

                <?php
                 // Realizar la consulta a la base de datos
                  include('conexion.php');  // Incluye el archivo de conexión
                 
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

                  $sql = "SELECT
                  mg.ID AS MensajeID,
                  mg.Contenido AS MensajeContenido,
                  mg.FechaEnvio AS FechaEnvio,
                  u.Usuario AS RemitenteUsuario,
                  u.ID AS RemitenteID,
                  g.ID AS GrupoID,
                  g.Nombre AS NombreGrupo,
                  CONCAT(
                      TIMESTAMPDIFF(HOUR, mg.FechaEnvio, NOW()), ' horas ',
                      MOD(TIMESTAMPDIFF(MINUTE, mg.FechaEnvio, NOW()), 60), ' minutos'
                  ) AS DiferenciaTiempo
              FROM Mensajes_grupo mg
              JOIN Usuarios u ON mg.RemitenteID = u.ID
              JOIN Grupo g ON mg.Grupo_ID = g.ID
              WHERE g.ID = $id_grupo  ORDER BY FechaEnvio asc";
                 $result = $conn->query($sql);
                ?>

                 <?php
                  // Verificar si se obtuvieron resultados
                 if ($result->num_rows > 0) {
                 // Iterar sobre los resultados y generar las opciones del select
                  while ($row = $result->fetch_assoc()) {
                  //echo "<option value='" . $row["Id"] . "'>" . $row["Nombre"] . "</option>";
                  if($row["RemitenteID"] == $ID){ //USUARIO LOGG DERECHA

                    
                                        
                    echo '
                    <div class="mensaje left">
                    <div class="cuerpo">
                         <img src="http://localhost/multimedia/png/user-foto-3.png" alt=""> 
                        <div class="texto">
                        '. $row["MensajeContenido"] .'
                            <span class="tiempo">
                                <i class= bx bx-time-five ></i>
                                '. $row["DiferenciaTiempo"] .'
                                
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
                        echo '</div>
                </div>';

                  }else{ //USUARIO ESCRITO IZQUIERDA


                    
                    
                    echo '
                    <div class="mensaje">
                    <div class="avatar">';
                      // Obtén el nombre de usuario de alguna manera
     $nombreUsuario = $row["RemitenteID"]; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
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
                      //  <img src="../imagenes_usuarios/gatitochamba.jpg" alt="img">
                        echo '</div>
                    <div class="cuerpo">
                        
                        <div class="texto">

                        ' . $row["RemitenteUsuario"] . ': ' . $row["MensajeContenido"] . '
                            
                            <span class="tiempo">
                                <i class= bx bx-time-five ></i>
                                '. $row["DiferenciaTiempo"] .'
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

                    
                </div>
    
    
                    

            </div>
            <div class="panel-escritura">
                 <form class="textarea" action="enviarm_grupo.php" method="post">
                 <input type="hidden" name="usuario" value="<?php echo $username; ?>">
                 <input type="hidden" name="id_usuario" value="<?php echo $ID; ?>">
                 <input type="hidden" name="grupo" value="<?php echo $grupo; ?>">
                 <input type="hidden" name="id_grupo" value="<?php echo $id_grupo; ?>">
                     <div class="opcines">
                         <button type="button">
                             <i class="bx bx-file-blank" style="color: black;"></i>
                             <label for="file"></label>
                             <input type="file" id="file">
                         </button>
                         <button type="button">
                             <i class="bx bx-image" style="color: black;" ></i>
                             <label for="img"></label>
                             <input type="file" id="img">
                         </button>
                     </div>
                     <textarea id="mensaje" name="mensaje" placeholder="Escribir mensaje"></textarea>
                    
                     <button type="submit" class="enviar"> <!-- Agregamos onclick -->
                      <i class="bx bxs-send"></i>
                     </button>
                 </form>

                 </div>
        </div>
        
        

        
    </div>


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

                <?php
                 // Realizar la consulta a la base de datos
                  include('conexion.php');  // Incluye el archivo de conexión
                  $username = $_GET['username'];

                  $sql = "SELECT Usuarios.ID, Usuarios.Usuario, Usuarios.Apellidos
                  FROM Usuarios
                  LEFT JOIN MiembrosGrupo ON Usuarios.ID = MiembrosGrupo.UsuarioID AND MiembrosGrupo.GrupoID = $id_grupo
                  WHERE MiembrosGrupo.ID IS NULL  and Usuario != '$username'";
                 $result = $conn->query($sql);
                  // Verificar si se obtuvieron resultados
                  if ($result->num_rows > 0) {
                    // Iterar sobre los resultados y generar las opciones del select
                     while ($row = $result->fetch_assoc()) {
                     
                     echo '

                     <li class="chat-list-item elemento-deseado" id="chat'. $row["ID"] .'" onclick="mostrarInfoUsuario("chat1")">
                    
                    
                    
                    <div class="usuario-info-chat">';

                         // Obtén el nombre de usuario de alguna manera
     $nombreUsuario = $row["ID"]; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
     //echo $idd;
    if ($nombreUsuario) {
    // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
        $nombreUsuarioURL = urlencode($nombreUsuario);
    
       // Genera la URL de la imagen con el nombre de usuario como parámetro
      $urlImagen = "mostrar2.php?id=$nombreUsuarioURL";

       // Muestra la imagen
        echo "<img src='$urlImagen' alt=''  class='chat-icon_V2' >";
    } else {
         echo "No se ha especificado un nombre de usuario.";
    }
                   // <img src="../imagenes_usuarios/gatitochamba.jpg" alt="Chat 1" class="chat-icon_V2">
                    echo '</div>
                    <span> ' . $row["Usuario"] . '</span> 
                    
                    </li>';
                     
   
                     }
                   }else {
                      //echo "<option value=''>No hay opciones disponibles</option>";
                   }



                ?>





                
                </ul>

    
                </div>
                <div class="info-usuario-seleccionado">

                    
                </div>
            </div>

            <button type="button" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>
        
    </div>
</div>
<script>
    // Obtén todos los elementos con la clase chat-list-item
    const chatItems2 = document.querySelectorAll('.elemento-deseado');

    //const chatItems2 = document.querySelectorAll('.chat-list-item');

    // Agrega un evento de clic a cada elemento
    chatItems2.forEach(item => {
        item.addEventListener('click', function() {
            // Obtén el ID del elemento
            const id = item.id.replace('chat', '');

            // Obtén el nombre de usuario
            const username = this.querySelector('span').innerText;

            // Redirige a otra página con los parámetros id y username
            window.location.href = 'agregarmimembrogrupo.php?id=' + id + '&usuario=' + username + '&id_grupo=<?php echo $id_grupo; ?>&nombre_grupo=<?php echo $grupo; ?>&usuarioc=<?php echo $username; ?>';

        });
    });
</script>


<!-- ventana emergente  crear SubGrupo-->
<div id="miVentanaEmergenteSubCrearGrupos" class="popup">
    <div class="popup-content">
        <button type="button" class="close-button" onclick="cerrarVentanaEmergenteSubCrearGrupos()">&times;</button>
        <form action="crear_subgrupo.php" method="post" enctype="multipart/form-data">


            <input type="hidden" name="id_grupo" value="<?php echo  $id_grupo; ?>">
            <input type="hidden" name="grupo" value="<?php echo $grupo; ?>">
            <input type="hidden" name="usuarioid" value="<?php echo $idd; ?>">
            <input type="hidden" name="usuario" value="<?php echo $_GET['username']; ?>">

              
            <div class="chat-main">
                <div class="form-group">
                    <label for="nombreGrupo">Nombre del SubGrupo:</label>
                    <input type="text" id="nombreGrupo" name="nombreGrupo" placeholder="Ingrese el nombre del grupo" required>
                </div>
                <div class="form-group">
                    <label for="descripcionGrupo">Descripción del SubGrupo:</label>
                    <textarea id="descripcionGrupo" name="descripcionGrupo" rows="4" placeholder="Ingrese la descripción del grupo" required></textarea>
                </div>
                <div class="form-group">
                    <label for="fotoGrupo">Foto del SubGrupo:</label>
                    <input type="file" id="fotoGrupo" name="fotoGrupo" accept="image/*" onchange="mostrarImagen()">

                    
                </div>
                <div class="form-group">
                    <img id="imagenMostrada" src="" alt="Imagen del grupo" style="max-width: 100%; display: none;">
                </div>
            </div>

            <button type="submit" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>



        <!--
        <form>
            <div class="chat-main">

            
                <input type="hidden" name="id_grupo" value="<?php //echo  $id_grupo; ?>">
                <input type="hidden" name="grupo" value="<?php //echo $grupo; ?>">


                <div class="form-group">
                    <label for="nombreGrupo">Nombre del SubGrupo:</label>
                    <input type="text" id="nombreGrupo" name="nombreGrupo" placeholder="Ingrese el nombre del grupo" required>
                </div>
                <div class="form-group">
                    <label for="descripcionGrupo">Descripción del SubGrupo:</label>
                    <textarea id="descripcionGrupo" name="descripcionGrupo" rows="4" placeholder="Ingrese la descripción del grupo" required></textarea>
                </div>
                <div class="form-group">
                    <label for="fotoGrupo">Foto del SubGrupo:</label>
                    <input type="file" id="fotoGrupo" name="fotoGrupo" accept="image/*" onchange="mostrarImagen()">

                    
                </div>
                <div class="form-group">
                    <img id="imagenMostrada" src="" alt="Imagen del grupo" style="max-width: 100%; display: none;">
                </div>
            </div>

            <button type="button" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>

-->

    </div>
</div>
<!-- ventana emergente  crear Grupo-->
<div id="miVentanaEmergenteCrearGrupos" class="popup">
    <div class="popup-content">
        <button type="button" class="close-button" onclick="cerrarVentanaEmergenteCrearGrupos()">&times;</button>

        <form>
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

            <button type="button" class="submit-button" onclick="enviarDatos()">Enviar</button>
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
                <?php
                 // Realizar la consulta a la base de datos
                  include('conexion.php');  // Incluye el archivo de conexión
                  $username = $_GET['username'];

                  $sql = "SELECT
                  U.ID AS IDUsuario,
                  U.Usuario AS NombreUsuario,
                  MG.GrupoID,
                  G.Nombre AS NombreGrupo
                  FROM Usuarios U
                  INNER JOIN MiembrosGrupo MG ON U.ID = MG.UsuarioID
                  INNER JOIN Grupo G ON MG.GrupoID = G.ID
                  WHERE MG.GrupoID = $id_grupo";
                   $result = $conn->query($sql);
                  // Verificar si se obtuvieron resultados
                  if ($result->num_rows > 0) {
                    // Iterar sobre los resultados y generar las opciones del select
                     while ($row = $result->fetch_assoc()) {
                     
                     echo '

                     <li class="chat-list-item" id="chat'. $row["IDUsuario"] .'" onclick="mostrarInfoUsuario("chat1")">
                    
                    
                    
                    <div class="usuario-info-chat">';
                // Obtén el nombre de usuario de alguna manera
                $nombreUsuario = $row["IDUsuario"]; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
                //echo $idd;
               if ($nombreUsuario) {
               // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
                   $nombreUsuarioURL = urlencode($nombreUsuario);
               
                  // Genera la URL de la imagen con el nombre de usuario como parámetro
                 $urlImagen = "mostrar2.php?id=$nombreUsuarioURL";
           
                  // Muestra la imagen
                   echo "<img src='$urlImagen' alt=''  class='chat-icon_V2' >";
               } else {
                    echo "No se ha especificado un nombre de usuario.";
               }

                    //<img src="../imagenes_usuarios/gatitochamba.jpg" alt="Chat 1" class="chat-icon_V2">
                    echo '</div>
                    <span> ' . $row["NombreUsuario"] . '</span> 
                    
                    </li>';
                     
   
                     }
                   }else {
                      //echo "<option value=''>No hay opciones disponibles</option>";
                   }



                ?>
                
                </ul>

    
                </div>

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
