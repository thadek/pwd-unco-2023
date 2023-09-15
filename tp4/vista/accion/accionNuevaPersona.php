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
        <h2>Resultado Nueva Persona</h2>
        <div class="container text-center">
        <?php

            $datos = darDatosSubmitted();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $nroDni = $datos["nroDni"];
                $nombre = $datos["nombre"];
                $apellido = $datos["apellido"];
                $fechaNac = $datos["fechaNac"];

                $fechaSql = date('Y-m-d', strtotime(str_replace('/', '-', $fechaNac)));

                $telefono = $datos["telefono"];
                $domicilio = $datos["domicilio"];

                // Realiza las validaciones necesarias, por ejemplo, si el DNI ya existe en la base de datos
                $abmPersona = new AbmPersona();
                $resultado = $abmPersona->agregarNuevaPersona($nroDni, $nombre, $apellido, $fechaSql, $telefono, $domicilio);

                if (strpos($resultado, "registrada con éxito") !== false) {
                    // Éxito: la persona se registró correctamente
                    echo "Persona registrada con éxito.";
                } else {
                    // Error: se produjo un error durante el registro
                    echo "Error al registrar la persona: " . $resultado;
                }
            } else {
                // Redirigir a la página de registro si se accede directamente a este archivo sin enviar el formulario
                header("Location: NuevaPersona.php");
                exit();
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