<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>
<link rel="stylesheet" href="../css/MyStyle.css">

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<!-- Boostrap links -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="../css/Inicio-Registro.css">
 <!-- icono de la pagina -->
 <link rel="icon" href="../icon/bisonte.ico" type="image/x-icon">

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Selecciona el enlace por su ID
    var registroLink = document.getElementById("registroLink");
  
    // Agrega un evento de clic al enlace
    registroLink.addEventListener("click", function (event) {
      event.preventDefault(); // Evita el comportamiento predeterminado del enlace
      window.location.href = "inicio.php"; // Redirige a otro.html
    });
  });
  </script>
</head>
<body>



<form action="insertar_usuario.php" method="post" enctype="multipart/form-data">
 
  
  <div class="container-Registro">
    <div class="imgcontainerRegistro">
      <img src="../img/bisonte.png" alt="Avatar" class="avatarRegitrso"> 
      <center><h2 class = "RegistroTitulo">Registro</h2></center>
    </div>
   
    <form action="insertar_usuario.php" method="post" enctype="multipart/form-data">

      <!-- nombre usuario -->
      <div class="input-box-Registro">
        <label class="custom-label" for="uname"><b>Nombre de Usuario:</b></label>
        <input type="text" placeholder="Ingrese su nombre de usuario" name="usuario" id="usuario" required>
        <i class='bx bxs-user'></i>
      </div>
      <!-- nombre usuario -->
          <!--Nombre  -->
          <div class="input-box-Registro">
            <label for="nombre"><b>Nombre:</b></label>
            <input type="text" placeholder="Ingrese su nombre" id="nombre" name="nombre" required>
            <i class='bx bxs-user-circle'></i>
          </div>
          <!--Nombre  -->
          <!--Apellido  -->
          <div class="input-box-Registro">
            <label for="apellido"><b>Apellido: </b></label>
            <input type="text" placeholder="Ingrese su Apellido" id="apellidos" name="apellidos">      
              <i class='bx bxs-user-circle'></i>
          </div>
          <!--Apellido  -->
          <!--Telefono  -->
          <div class="input-box-Registro">
            <label for="telefono"><b>Numero de telefono: </b></label>

        
        <input type="text" placeholder="Ingrese su numero de telefono" name="telefono" id="telefono" required>
        <i class='bx bxs-phone'></i>
          </div>
          <!--Telefono  -->
                <!--Clave  -->
                <div class="input-box-Registro">
                  <label for="psw"><b>Clave de paso: </b></label>
                  <input type="password" placeholder="Ingresar Clave de paso" name="contrasena" id="contrasena" required>
                  <i class='bx bxs-lock-alt' ></i>
                </div>
                <!--Clave  -->
                
         <div class="input-box-Registro">

<label for="tipo_usuario"><b>Tipo de Usuario:</b></label>
<select id="tipo_usuario" class ="ComboOpciones" name="tipo_usuario"  required>
   <option value="Alumno">Alumno</option>
   <option value="Maestro">Maestro</option>
</select>
</div>

<div class="col form-floating mt-3 mb-3">
          <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" onchange="mostrarImagen(event)">
          <label for="imagen">Imagen</label>
        </div>
        <img id="imagenMostrada" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 100%; height: auto;">

        <script> 
         function mostrarImagen(event) {
         const input = event.target;
         const imgMostrada = document.getElementById('imagenMostrada');

          // Asegúrate de que se haya seleccionado un archivo
          if (input.files && input.files[0]) {
           const reader = new FileReader();

          reader.onload = function(e) {
            imgMostrada.src = e.target.result;
            imgMostrada.style.display = 'block';  // Muestra la imagen
          };

           reader.readAsDataURL(input.files[0]);  // Lee el archivo como una URL de datos
          }
          }

          </script>

<input class = "btnRegistrar" type="submit" value="REGISTRAR">
<span class="regs"><a href="#" id="registroLink">Regresar a Inicio</a></span>
         </div>

        

    </form>
  


    <!--<button  class = "btnRegistrar" type="submit">Registrar</button>
-->
    
   
   
 
    
  </div>


</form>

</body>
</html>
