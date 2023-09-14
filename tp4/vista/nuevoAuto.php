<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Auto</title>
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


        <div class="card col-12 text-center" data-bs-theme="dark">
            <div class="container text-center">
                <div class="row">
                    <div class="col col-sinp">
                        <div class="img-autos"></div>
                    </div>
                    <div class="col d-flex text-center flex-column align-items-center justify-content-center ">
                        <form action="accion/accionNuevoAuto.php" class="d-flex flex-column gap-3" style="width:60%" method="post">
                            <h4>Registrar Nuevo Auto</h4>

                            <input class="form-control p-3" type="text" id="patente" name="patente" placeholder="Patente">


                            <input class="form-control p-3" type="text" id="marca" name="marca" placeholder="Marca">
                            <input class="form-control p-3" type="text" id="modelo" name="modelo" placeholder="Modelo(año)" required>

                            <input class="form-control p-3" type="text" id="dniDuenio" name="dniDuenio" required placeholder="DNI del dueño">

                            <input class="btn btn-light p-3" type="submit" value="Registrar Auto">
                        </form>
                    </div>
                </div>
    </main>
    <div class="contenedor">
    </div>
    <?php include_once("../estructura/Footer.php"); ?>
</body>

</html>