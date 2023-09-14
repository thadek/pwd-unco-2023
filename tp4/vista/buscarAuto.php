<!DOCTYPE html>
<html>

<head>
    <title>Buscar Auto - Grupo 8</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/inicio.css">
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-dark">
    <?php
    include_once("../estructura/menu/menu.php");
    $rutalogo = "./img/";
    include_once("../estructura/Navbar.php");
    ?>
    <main class="container-fluid cont container text-light">

        


        <div class="card col-12 text-center" data-bs-theme="dark">
          
            <div class="container text-center">
                <div class="row">
                    <div class="col col-sinp">
                        <div class="img-autos" ></div>
                    </div>
                    <div class="col d-flex text-center flex-column align-items-center justify-content-center ">
                    <h4>Buscar Auto por Patente</h4>
                        <form action="./accion/accionBuscarAuto.php" method="post">
                            <div class="input-group">


                                <input class="form-control p-3" type="text" placeholder="Código de patente" id="patente" name="patente" required>
                                <input class="btn btn-light p-3" type="submit" value="Buscar">
                            </div>





                        </form>

                    </div>

                </div>
            </div>






        </div>



    </main>
    <div class="contenedor">





    </div>

    <?php
    include_once("../estructura/Footer.php");
    ?>
</body>

</html>