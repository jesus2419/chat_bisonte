<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form action="insertar_usuario.php" method="post">
        <label for="usuario">Nombre de Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br>
        
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br>
        
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br>
        
        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" required><br>
        
        <label for="tipo_usuario">Tipo de Usuario:</label><br>
        <select id="tipo_usuario" name="tipo_usuario" required>
            <option value="Alumno">Alumno</option>
            <option value="Maestro">Maestro</option>
        </select><br><br>
        
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
