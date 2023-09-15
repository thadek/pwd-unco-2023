<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Datos de Persona</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/inicio.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark">
    <?php

    require_once("../../../configuracion.php");
    $rutalogo = "../img/";
    include_once("../../estructura/menu/menu_accion.php");
    include_once("../../estructura/Navbar.php");
    require_once("../../../configuracion.php");
    ?>

<main class="container-fluid cont container text-light">

    <div class="card col-12 text-center" data-bs-theme="dark">
        <h2 class="p-3">Actualizar Datos de Persona</h2>
        <div class="container text-center p-5">
                <?php

                $datos = darDatosSubmitted();
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nroDni'])) {
                    $nroDni = $datos['nroDni'];
                    $nombre = $datos['nombre'];
                    $apellido = $datos['apellido'];
                    $fechaNac = $datos['fechaNac'];
                    $telefono = $datos['telefono'];
                    $domicilio = $datos['domicilio'];

                    
                    $abmPersona = new AbmPersona();

                    // Modifica los datos de la persona en la base de datos
                    $resultado = $abmPersona->modificarDatosPersona($nroDni, $nombre, $apellido, $fechaNac, $telefono, $domicilio);
                    echo $resultado;
                } else {
                    echo '<p>No se han proporcionado datos válidos para actualizar.</p>';
                }
                ?>  
        </div>
    </div>
</main>
<div class="contenedor">
</div>
<?php include_once("../../estructura/Footer.php"); ?>
</body>
</html>