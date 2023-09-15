<!DOCTYPE html>
<html>
<?php
require("../../configuracion.php");
?>

<head>
    <title>Autos de Persona</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/inicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="js/jquery.js"></script>
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
                    
                    <div class="col-md-12 d-flex text-center flex-column align-items-center justify-content-center p-5 gap-2">
    <h3>Visualizar datos</h4>
        <?php

        // Verifica si se proporcionó un DNI en la URL
        if (isset($_GET['dni'])) {
            // Obtiene el DNI de la URL
            $dniDuenio = $_GET['dni'];
            // Crea instancias de las capas de control AbmPersona y AbmAuto
            $abmPersona = new AbmPersona();
            $abmAuto = new AbmAuto();

            // Obtiene los datos de la persona
            $persona = $abmPersona->obtenerDatosPersona($dniDuenio);

            if ($persona !== null) {
                echo <<<DATOS
                <div class="card p-3">
                <h5 class="card-title"><i class="bi bi-info-circle"></i>
                Datos de la Persona</h2>
                <div class="row d-flex ">
                <div class="col-md-12 col-xl-6  d-flex flex-column gap-3">

                <div class="form-floating">
                <input type="text" disabled class="form-control" id="floatingInputGrid1"  value="{$persona->getNroDni()}">
                <label for="floatingInputGrid1">DNI</label>
                </div>
                <div class="form-floating">
                <input type="text" disabled class="form-control" id="floatingInputGrid2"  value="{$persona->getNombre()}">
                <label for="floatingInputGrid2">Nombre</label>
                </div>
                <div class="form-floating">
                <input type="text" disabled class="form-control" id="floatingInputGrid3"  value="{$persona->getApellido()}">
                <label for="floatingInputGrid3">Apellido</label>
                </div>
                
              
                
                </div>
                <div class="col-md-12 col-xl-6 d-flex flex-column gap-3">

                <div class="form-floating">
                <input type="text" disabled class="form-control" id="floatingInputGrid4"  value="{$persona->getFechaNac()}">
                <label for="floatingInputGrid4">Fecha de nacimiento</label>
                </div>
                <div class="form-floating">
                <input type="text" disabled class="form-control" id="floatingInputGrid5"  value="{$persona->getTelefono()}">
                <label for="floatingInputGrid5">Telefono</label>
                </div>
                <div class="form-floating">
                <input type="text" disabled class="form-control" id="floatingInputGrid6"  value="{$persona->getDomicilio()}">
                <label for="floatingInputGrid6">Domicilio</label>
                </div>
          

                </div>
                </div>
                </div>
                DATOS;
                // Obtiene los autos de la persona
                $autos = $abmAuto->obtenerAutosPorDni($dniDuenio);

                if (!empty($autos)) {
                    echo '<h4>Autos de la Persona</h2>';
                    $salida = <<<TABLA
                                <table class="table table-dark">
                                <tr><th>Patente</th><th>Marca</th><th>Modelo</th></tr>
                                TABLA;
                    foreach ($autos as $auto) {
                        $salida.= <<<FILA
                        <tr>
                        <td> {$auto->getPatente()} </td>
                        <td> {$auto->getMarca()} </td>
                        <td> {$auto->getModelo()} </td>
                        </tr>
                        FILA;
                    }
                    $salida.= "</table>";
                    echo $salida;
                } else {
                    echo '<p>Esta persona no tiene autos registrados.</p>';
                }
            } else {
                echo '<p>Persona no encontrada.</p>';
            }
        } else {
            echo '<p>DNI no proporcionado en la URL.</p>';
        }
        ?>
        </div>
        </div>
    </div>
</div>
    </main>
    <div class="contenedor">
    </div>
    <?php include_once("../estructura/Footer.php"); ?>
</body>

</html>