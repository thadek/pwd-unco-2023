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
        <h2>Agregar Auto Nuevo</h2>
        <div class="container text-center">
        <?php

            $datos = darDatosSubmitted();
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $patente = $datos["patente"];
                $marca = $datos["marca"];
                $modelo = $datos["modelo"];
                $dniDuenio = $datos["dniDuenio"];

                
                $abmPersona = new AbmPersona();
                $persona = $abmPersona->obtenerDatosPersona($dniDuenio);

                if ($persona === null) {
                    
                    echo "La persona no está registrada. <a href='../NuevaPersona.php'>Registrar Nueva Persona</a>";
                } else {
                    
                    $abmAuto = new AbmAuto();
                    $resultado = $abmAuto->agregarNuevoAuto($patente, $marca, $modelo, $dniDuenio);
                    
                    echo $resultado;
                }
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