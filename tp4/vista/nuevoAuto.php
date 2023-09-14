<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Auto</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/inicio.css">
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/validacion.css">
    <script src="js/jquery.js"></script>
</head>
<body class="bg-dark">
<?php
    $rutalogo = "./img/";
    include_once("../estructura/menu/menu.php");
    include_once("../estructura/Navbar.php");
?>

<main class="container-fluid cont container text-light">
<h1>Registrar Nuevo Auto</h1>
<form action="accion/accionNuevoAuto.php" method="post" id="autoForm">
    <div class="form-group">
        <label for="patente">Número de Patente:</label>
        <input type="text" id="patente" name="patente" ><br><br>
        
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" ><br><br>
        
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" ><br><br>

        <label for="dniDuenio">DNI del Dueño:</label>
        <input type="text" id="dniDuenio" name="dniDuenio" ><br><br>

        <input type="submit" value="Registrar Auto">
    </form>
</body>
</html>