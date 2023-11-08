<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" href="../css/MyStyle.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
      window.location.href = "Register.php"; // Redirige a otro.html
    });
  });
  </script>
  
</head>
<body>



<form action="login.php" method="post">


  <div class="container"> 

    <form action="login.php" method="post">
      <div class="imgcontainer">
        <img src="../img/bisonte.png" alt="Avatar" class="avatar">
      </div>
      <center><h2>Hola Bisonte!</h2></center>
      
     
      <div class="input-box">
        <label class="custom-label"for="uname"><b>Nombre de Usuario:</b></label>
        <input type="text" placeholder="Ingrese su nombre de usuario" name="uname" required>
        <i class='bx bxs-user'></i>
  
      </div>
      
     
      <div class="input-box">
        <label class="custom-label"for="psw"><b>Clave de paso: </b></label>
        <input type="password" placeholder="Ingresar Clave de paso" name="password" id="password"  required>
        <i class='bx bxs-lock-alt' ></i>
      </div>

    </form>

    
        
    <button type="submit" class = "btn">Ingresar</button>
  
   
    <span class="regs">No se ah <a href="#" id="registroLink">Registrado</a>?</span>

   
  
    
 
    
  </div>


</form>

</body>
</html>
