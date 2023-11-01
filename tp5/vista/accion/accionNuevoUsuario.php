<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuario agregado</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>

    </head>

    <body class="bg-dark">
        <?php
            require_once("../../../configuracion.php");   
        ?>

        <main class="container-fluid cont container text-light">
        <div class="card col-12 text-center" data-bs-theme="dark">
            <h2>Registrar nuevo usuario</h2>
            <div class="container text-center">
                <?php
                    $datos = darDatosSubmitted();
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $nombreUsuario = $datos["usnombre"];
                        $mail = $datos["usmail"];
                        $pass = $datos["uspass"];

                        $abmUsuario = new AbmUsuario();
                        $resultado = $abmUsuario->agregarNuevoUsuario($nombreUsuario, $mail, $pass);

                        echo $resultado;
                    }
                ?>
            </div>
        </div>
    </body>
</html>