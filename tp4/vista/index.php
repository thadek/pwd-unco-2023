<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP 4</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/inicio.css">
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
</head>

<body class=" bg-dark  ">

    <?php
    require_once("../../configuracion.php");
    $rutalogo = "./img/";
    include_once("../estructura/menu/menu.php");
    include_once("../estructura/Navbar.php");
    ?>

    <main class="container-fluid cont container text-center text-light">

        <h1>
            ¡Hola!
        </h1>
        <br />
        <h2>
            Te damos la bienvenida al Trabajo Práctico N°4
        </h2>
        <p>
            Desplazate por el menu superior para acceder a los ejercicios.
        </p>

    </main>


    <div class="contenedor">
    </div>


    <?php include_once("../estructura/Footer.php"); ?>

</body>



</html>