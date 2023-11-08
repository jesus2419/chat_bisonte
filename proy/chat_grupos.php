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
                 // Realizar la consulta a la base de datos
                  include('conexion.php');  // Incluye el archivo de conexión
                  $username = $_GET['username'];

                  $sql = "SELECT ID, Usuario, Nombre, Apellidos FROM Usuarios WHERE Usuario != '$username'";
                 $result = $conn->query($sql);
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
</head>
<body>
    <header>
        <a href="#" class ="imagenUsuario">
            <img src="../img/user.jpeg" alt = "User"  >
            <h3 id="NombreUsurio"><?php echo $_GET['username']; ?></h3>
        </a>
        <nav>
            <a id="GuposBarraSuperior" class ="nav_link" href="#">Grupos</a>
            <a id="ChatBarraSuperior" class ="nav_link selected " href="chat.php?username=<?php echo urlencode($_GET['username']); ?>">Chats</a>
            <a id="InsigniasBarraSuperior" class ="nav_link" href="#">Insignias</a>
            <a id="TareasBarraSuperior" class ="nav_link" href="#">Tareas</a>
            <a class ="nav_link" href="inicio.php">
                <i class='bx bxs-log-out bx-flip-horizontal' ></i>
            </a>
        </nav>
        
    </header>

    
    <div class="chat-container">
        
        <div class="chat-sidebar">

            <div class="input-buscar">
                <input type="search" placeholder="Buscar usuario">
                <button class="button-search"><i class="bx bx-search-alt-2"></i></button>
            </div>
            
           
            <ul class="chat-list">
                

                <?php
                 // Realizar la consulta a la base de datos
                  include('conexion.php');  // Incluye el archivo de conexión
                  $username = $_GET['username'];

                  $sql = "SELECT ID, Usuario, Nombre, Apellidos FROM Usuarios WHERE Usuario != '$username'";
                 $result = $conn->query($sql);
                ?>

                 <?php
                  // Verificar si se obtuvieron resultados
                 if ($result->num_rows > 0) {
                 // Iterar sobre los resultados y generar las opciones del select
                  while ($row = $result->fetch_assoc()) {
                  //echo "<option value='" . $row["Id"] . "'>" . $row["Nombre"] . "</option>";
                  echo '
                  <li class="chat-list-item" id="chat' . $row["ID"] . '">
                      <div class="usuario-info-chat">
                          <img src="../img/user.jpeg" alt="Chat 1" class="chat-icon">
                          
                      </div>
                      <span>' . $row["Usuario"] . '</span> 
                  </li>';
                  /*
                  echo '
                       <li class="chat-list-item" id="chat1">
                       <div class="usuario-info-chat">
                       <img src="../img/user.jpeg" alt="Chat 1" class="chat-icon">
                       <span class="estado-usuario enlinea"></span>
                       </div>
                      <span>' .$row["Usuario"]. '</span> 
                    </li>';
                    */

                  }
                }else {
                   //echo "<option value=''>No hay opciones disponibles</option>";
                }
                ?>



                

            </ul>
            <script>
    // Obtén todos los elementos con la clase chat-list-item
    const chatItems = document.querySelectorAll('.chat-list-item');

    // Agrega un evento de clic a cada elemento
    chatItems.forEach(item => {
        item.addEventListener('click', function() {
            // Obtén el ID del elemento
            const id = item.id.replace('chat', '');

            // Obtén el nombre de usuario
            const username = this.querySelector('span').innerText;

            // Redirige a otra página con los parámetros id y username
            window.location.href = 'chatss.php?id=' + id + '&otro_username=' + username + '&username=<?php echo $username; ?>';
        });
    });
</script>




            <div id="Grupos_list_container">
                <!-- Aquí se mostrará la lista de grupos -->
            </div>
            
        </div>
       

        
    </div>




    
   
    
</body>
</html>
