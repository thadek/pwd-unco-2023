<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Auto</title>
</head>
<body>
    <h1>Registrar Nuevo Auto</h1>
    <form action="accion/accionNuevoAuto.php" method="post">
        <label for="patente">Número de Patente:</label>
        <input type="text" id="patente" name="patente" required><br><br>
        
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br><br>
        
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br><br>

        <label for="dniDuenio">DNI del Dueño:</label>
        <input type="text" id="dniDuenio" name="dniDuenio" required><br><br>

        <input type="submit" value="Registrar Auto">
    </form>
</body>
</html>