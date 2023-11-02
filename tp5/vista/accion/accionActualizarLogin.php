<?php
    require_once("../../../configuracion.php"); 
    require_once('../../modelo/conector/BaseDatos.php');
    require_once('../../modelo/Usuario.php');
    require_once('../../control/AbmUsuario.php'); 
            

?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Usuario</title>
</head>
<body>
    <h1>Actualizar Usuario</h1>
    <form method="POST">
        <label for="nuevo_nombre">Nuevo Nombre:</label>
        <input type="text" id="nuevo_nombre" name="nuevo_nombre" value="<?php echo $usuario['nombre']; ?>" required><br>
        <label for="nuevo_email">Nuevo Email:</label>
        <input type="email" id="nuevo_email" name="nuevo_email" value="<?php echo $usuario['email']; ?>" required><br>
        <input type="submit" name="actualizar" value="Actualizar">
    </form>
</body>
</html>