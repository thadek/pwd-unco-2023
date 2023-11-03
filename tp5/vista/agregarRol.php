<!DOCTYPE html>
<html>
<head>
    <title>Agregar Rol</title>
</head>
<body>
    <h1>Agregar Rol</h1>

   
    <form action="accion/agregarRol.php" method="post">
        <label for="roldescripcion">Nombre del Rol:</label>
        <input type="text" id="roldescripcion" name="roldescripcion" required>
        <br>
        <input type="submit" value="Agregar Rol">
    </form>

    
    <a href="index.php">Volver a la página principal</a>
</body>
</html>