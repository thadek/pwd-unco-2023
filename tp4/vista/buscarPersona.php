<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buscar Persona</title>
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
    <h1>Buscar Persona</h1>
    <form action="accion/accionBuscarPersona.php" method="POST">
        <label for="nroDni">Número de Documento:</label>
        <input type="text" id="nroDni" name="nroDni" >
        <br>
        <input type="submit" value="Buscar">
    </form>
    </main>
    <div class="contenedor">
    </div>
    <?php include_once("../estructura/Footer.php"); ?>
</body>
</html>