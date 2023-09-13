<!DOCTYPE html>
<html>
<head>
    <title>Buscar Auto</title>
    
</head>
<body>
    <?php
    ?>


    <h1>Buscar Auto por Patente</h1>

    <form action="./accion/accionBuscarAuto.php" method="post">
        <label for="patente">Número de Patente:</label>
        <input type="text" id="patente" name="patente" required>
        <input type="submit" value="Buscar">
    </form>
    
</body>
</html>