<?php
// Realizar la consulta a la base de datos
                  include('conexion.php');  // Incluye el archivo de conexión
                  if ($conn->connect_error) {
                    die("Error de conexión a la base de datos: " . $conn->connect_error);
                }
                  $id = $_GET['id'];
                  $grupo = $_GET['id_grupo'];
                  $grupo_nombre = $_GET['grupon'];
                  $id_usuario = $_GET['id_usuario'];
                  $usuario = $_GET['usuario'];
                  $id_grupo2 = $_GET['id_grupo2'];
                  

                  $sql = "SELECT  ID ,
                  Nombre ,
                  SubGrupo_ID ,
                  Fecha_creacion ,
                  Descripcion,
                  Estado  from tareas where subgrupo_ID = $grupo and Estado = 1 and ID = $id";
                 $result = $conn->query($sql);

                 if (!$result) {
                    die("Error en la consulta: " . $conn->error);
                }
                

                
                  // Verificar si se obtuvieron resultados
                 if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc(); // Obtener la fila de resultados



                    $sqlSelectUsuario = "SELECT  ID ,
    Nombre ,
	Descripcion  ,
    Fecha_creacion  ,
    Creador_ID ,
    ImagenBlop from grupo
    WHERE
    Creador_ID = $id_usuario";

    $result2 = $conn->query($sqlSelectUsuario);

    if ($result2->num_rows > 0) {
        

        
        $contenido = "<div class='usuario-seleccionado'>

        <div class='cuerpo'>
            <span><h3>"; $contenido .= $row["Nombre"]; $contenido .="</h3></span>
            <span><h3>"; $contenido .= $row["Descripcion"]; $contenido .="</h3></span>
            <!-- <span>Activo - Escribiendo...</span> -->
        </div>
        <div class='opciones'>
            <ul> 
                <!-- <li >
                    <button type='button' style='background-color: rgba(17, 40, 102, 0.719);'#007bff title='Muro'><i class='bx bx-home' ></i>
                    </li>  -->
                <!-- <li>
                    <button type='button' title='Agregar Miembro'><i class='bx bxs-user-plus'></i>
                </li>
                <li>
                    <button type='button' title='Eliminar Miembro'><i class='bx bxs-user-minus'></i>
                </li> -->
        
                <!-- <li >
                    <button onclick='mostrarVentanaEmergenteAgregarMimbros_SubGrupos()'  type='button'  title='Agregar Membros' ><i class='bx bxs-user-plus'></i>
                        
                </li>
                <li >
                    <button onclick='mostrarVentanaEmergenteMiembros_SubGrupos()' type='button'  title='Miembros' ><i class='bx bx-user'></i>
                </li>  -->
                <li >
                    <!-- <button type='button'  title='Tareas' style='width: 80px; border-radius:0% ;'>Tareas <i class='bx bx-edit'></i> -->
                        
                    <!--
                                <button onclick='mostrarVentanaEmergenteAsignarInsignia()'style='width: 100px; border-radius:0% ;' type='button'  title='Insignias'>Insignias <i class='bx bx-edit'></i>
                                </button>  
                                
                                -->
                
                </li>
                <li >
                <!--
                    <button type='button' style='background-color: rgba(255, 0, 0, 0.534);'#007bff title='Eliminar SubGrupo' ><i class='bx bxs-trash'></i>
                    -->
                    </li> 
            </ul>
        </div>
        </div>
        <div class='panel-chat'>
        <table border='1'>
            <tr>
                <th>Nombre</th>
                <th> Entregada<i class='bx bx-checkbox-checked'></i></th>
                <th>Sin Entregar <i class='bx bx-task-x'></i></th>
                <th>comentario <i class='bx bxs-trophy'></i></th>
               
            </tr>
            ";
            $sql3 = "SELECT Usuarios.ID, Usuarios.Usuario, TareasSubGrupos.ID AS TareaSubGrupoID, TareasSubGrupos.Comentario
            FROM Usuarios
            LEFT JOIN MiembrosSubgrupo ON Usuarios.ID = MiembrosSubgrupo.UsuarioID
            LEFT JOIN TareasSubGrupos ON Usuarios.ID = TareasSubGrupos.Id_Usuario AND TareasSubGrupos.Id_Tarea = $id
            WHERE MiembrosSubgrupo.SubgrupoID = $grupo and Usuarios.ID !=  $id_usuario";

$result3 = $conn->query($sql3);

// Verificar si la consulta fue exitosa
if ($result3->num_rows > 0) {
    // Recorrer los resultados
    while ($row3 = $result3->fetch_assoc()) {
        $userID2 = $row3["ID"];
        $username2 = $row3["Usuario"];
        $tareaSubGrupoID = $row3["TareaSubGrupoID"];
        $comentario = $row3["Comentario"];



        
       

        
        $contenido .= "
        <tr>
           <td>                    
               <div class='usuario-info-chat'>";
               
        $nombreUsuario = $row3["ID"]; // Esto es un ejemplo, debes obtener el nombre de usuario de acuerdo a tu lógica
        //echo $idd;
       if ($nombreUsuario) {
       // Escapa el nombre de usuario para asegurarte de que sea seguro para la URL
           $nombreUsuarioURL = urlencode($nombreUsuario);
       
          // Genera la URL de la imagen con el nombre de usuario como parámetro
         $urlImagen = "mostrar2.php?id=$nombreUsuarioURL";
   
          // Muestra la imagen
          $contenido .= "<img src='$urlImagen' alt='' class='chat-icon'  >";
       } else {
           // echo "No se ha especificado un nombre de usuario.";
       }
               $contenido .= "
               <span class='estado-usuario enlinea'></span>
               </div>
                   <span>"; $contenido .= $row3["Usuario"]; $contenido .="</span>
           </td>";
           if ($row3["TareaSubGrupoID"] === NULL) {
            //echo "El elemento para el usuario $username es NULL.<br>";
            $contenido .=" 
           
           <td> </td>
           <td><i class='bx bx-task-x'></i></td>
           <td></td>
           </tr>";

            
            } else {
                $contenido .=" 
                
           <td><a href='decargar_copy.php?id=" . $tareaSubGrupoID . "' style='color: black;'>Revisar tarea</a><i class='bx bx-checkbox-checked'></i></td>
           <td></td>
           <td>" . $comentario . "</td>
           </tr>";

            //echo "El elemento para el usuario $username no es NULL y su ID es $tareaSubGrupoID.<br>";
           }
          

        
    }
} else {
    $contenido .= "No se encontraron resultados.";
}




             $contenido .= "
        </table>
        
        
        </div>";
       




    echo $contenido;
        

    } else {

        
                  

        $contenido2 = "<form action='subirTarea.php' method='post' enctype='multipart/form-data'>

        <input type='hidden' name='id' value='"; $contenido2 .=$id;$contenido2 .="'>
        <input type='hidden' name='id_grupo' value='"; $contenido2 .=$grupo;$contenido2 .="'>
        <input type='hidden' name='grupo' value='"; $contenido2 .= $grupo_nombre;$contenido2 .=" '>
        <input type='hidden' name='usuarioid' value='"; $contenido2 .= $id_usuario;$contenido2 .="'>
        <input type='hidden' name='usuario' value='"; $contenido2 .= $usuario;$contenido2 .="'>
        <input type='hidden' name='grupo_o' value='"; $contenido2 .= $id_grupo2;$contenido2 .="'>

          
        <div class='chat-main'>
            <div class='form-group'>
                <label for='nombreGrupo'>Tarea:</label>
                <label for='nombreGrupo'>"; $contenido2 .= $row["Nombre"]; $contenido2 .="</label>
                
            </div>
            <div class='form-group'>
                <label for='descripcionGrupo'>Descripción:</label>
                <label for='nombreGrupo'>"; $contenido2 .= $row["Descripcion"]; $contenido2 .="</label>
                </div>
            <div class='form-group'>
            <label for='descripcionGrupo'>Comentarios:</label>
            
            <textarea id='descripcionGrupo' name='descripcionGrupo' rows='4' placeholder='Ingrese un comentario para la tarea ' required></textarea>
            </div>
            <div class='form-group'>
                <label for='fotoGrupo'>Foto del SubGrupo:</label>
                <input type='file' name='archivo' id='archivo' accept='.pdf' >

                
            </div>
            <div class='form-group'>
                <img id='imagenMostrada' src='' alt='Imagen del grupo' style='max-width: 100%; display: none;'>
            </div>
        </div>

        <button type='submit' class='submit-button' onclick='enviarDatos()'>Enviar</button>
    </form>";
        echo $contenido2 ;
    }







                 
                }else {
                   //echo "<option value=''>No hay opciones disponibles</option>";
                }
?>