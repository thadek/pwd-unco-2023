<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cambio de Dueño de Auto</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/inicio.css">
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
  
</head>
<body class="bg-dark">
<?php
    $rutalogo = "./img/";
    include_once("../estructura/menu/menu.php");
    include_once("../estructura/Navbar.php");
    ?>
    
    <main class="container-fluid cont container text-light">
    <h1>Cambio de Dueño de Auto</h1>

    <form method="post" action="accion/accionCambioDuenio.php">
        <label for="patente">Patente del Auto:</label>
        <input type="text" id="patente" name="patente" required><br><br>

        <label for="nroDni">Número de DNI del Nuevo Dueño:</label>
        <input type="text" id="nroDni" name="nroDni" required><br><br>

        <input type="submit" value="Cambiar Dueño">
    </form>
    </main>
    <div class="contenedor">
    </div>
    <?php include_once("../estructura/Footer.php"); ?>
</body>
</html>