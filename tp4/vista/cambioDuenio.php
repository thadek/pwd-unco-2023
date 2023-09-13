<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cambio de Dueño de Auto</title>
  
</head>
<body>
    <h1>Cambio de Dueño de Auto</h1>

    <form method="post" action="accion/accionCambioDuenio.php">
        <label for="patente">Patente del Auto:</label>
        <input type="text" id="patente" name="patente" required><br><br>

        <label for="nroDni">Número de DNI del Nuevo Dueño:</label>
        <input type="text" id="nroDni" name="nroDni" required><br><br>

        <input type="submit" value="Cambiar Dueño">
    </form>
</body>
</html>