<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Buscar y Actualizar Persona</title>
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
    ?>

    <main class="container-fluid cont container text-light">


        <div class="card col-12 text-center" data-bs-theme="dark">
            <div class="container text-center">
                <div class="row">
                    <div class="col col-sinp">
                        <div class="img-personas"></div>
                    </div>
                    <div class="col d-flex text-center flex-column align-items-center justify-content-center p-5 ">





                        <?php

                        $datos = darDatosSubmitted();
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nroDni'])) {
                            $nroDni = $datos['nroDni'];


                            $abmPersona = new AbmPersona();


                            $persona = $abmPersona->obtenerDatosPersona($nroDni);

                            if ($persona) {
                                // Muestra los datos de la persona en un formulario para su modificación
                                $salida = "";
                                $salida =
                                    <<<DATOS
                    <h4>Buscar y Actualizar Persona</h4>
                    <form action="ActualizarDatosPersona.php" class="d-flex flex-column gap-3" style="width:60%" method="POST">
                    <input type="hidden" name="nroDni" value="{$persona->getNroDni()}">           
                    <input class="form-control p-3" type="text" id="nombre" name="nombre" placeholder="Nombre" value="{$persona->getNombre()}" required>
                    <input class="form-control p-3" type="text" id="apellido" name="apellido" placeholder="Apellido" value="{$persona->getApellido()}" required>                 
                    <input class="form-control p-3" type="date" id="fechaNac" name="fechaNac" placeholder="Fecha Nacimiento" value="{$persona->getFechaNac()}" required>
                    <input class="form-control p-3" type="text" id="telefono" name="telefono" placeholder="Telefono" value="{$persona->getTelefono()}">              
                    <input class="form-control p-3" type="text" id="domicilio" name="domicilio" placeholder="Domicilio" value="{$persona->getDomicilio()}">
                    <input class="btn btn-light p-3" type="submit" value="Actualizar">
                    </form>
            DATOS;
                                echo $salida;
                            } else {
                                echo '<p>No se encontraron datos para el número de documento ingresado.</p>';
                            }
                        } else {
                            echo '<p>Por favor, complete el formulario de búsqueda.</p>';
                        }
                        ?>





                    </div>
                </div>
            </div>
        </div>

    </main>



    <div class="contenedor">
    </div>
    <?php include_once("../../estructura/Footer.php"); ?>







</body>

</html>