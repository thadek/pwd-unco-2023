<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Auto</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/inicio.css">
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


        <div class="card col-12 text-center" data-bs-theme="dark">
            <div class="container text-center">
                <div class="row">
                    <div class="col col-sinp">
                        <div class="img-autosAbs"></div>
                    </div>
                    <div class="col d-flex text-center flex-column align-items-center justify-content-center p-5">
                        <form action="accion/accionNuevoAuto.php" class="d-flex flex-column gap-3" style="width:60%" method="post" id="autoForm">
                            <h4>Registrar Nuevo Auto</h4>

                            <input class="form-control p-3" type="text" id="patente" name="patente" placeholder="Patente">
                            <span class="error-message"></span>

                            <input class="form-control p-3" type="text" id="marca" name="marca" placeholder="Marca">
                            <span class="error-message"></span>
                            <input class="form-control p-3" type="text" id="modelo" name="modelo" placeholder="Modelo(año)" >
                            <span class="error-message"></span>
                            <input class="form-control p-3" type="text" id="dniDuenio" name="dniDuenio"  placeholder="DNI del dueño">
                            <span class="error-message"></span>
                            <input class="btn btn-light p-3" type="submit" value="Registrar Auto">
                        </form>
                    </div>
                </div>
    </main>
    <div class="contenedor">
    </div>
    <?php include_once("../estructura/Footer.php"); ?>
    
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
        // Función para validar el DNI del dueño
        function validarDNI(dni) {
            return /^\d{8}$/.test(dni);
        }

        // Función para validar la patente
        function validarPatente(patente) {
            return /^[A-Z]{3}\s\d{3}$/.test(patente);
        }

        // Función para validar que el modelo sea numérico
        function validarModelo(modelo) {
            return /^\d+$/.test(modelo);
        }

        // Función para aplicar estilos y mostrar mensajes de error
        function aplicarEstilosYMensaje(elemento, valido, mensaje) {
            var errorSpan = elemento.next('.error-message');
            if (valido) {
                elemento.removeClass('error').addClass('success');
                errorSpan.text("");
            } else {
                elemento.removeClass('success').addClass('error');
                errorSpan.text(mensaje);
            }
        }

        // Validación al enviar el formulario
        $('#autoForm').submit(function(event) {
            var patenteInput = $('#patente');
            var dniDuenioInput = $('#dniDuenio');
            var modeloInput = $('#modelo');
            var marcaInput = $('#marca');

            var patenteValida = validarPatente(patenteInput.val());
            var dniValido = validarDNI(dniDuenioInput.val());
            var modeloValido = validarModelo(modeloInput.val());
            var marcaNoVacia = marcaInput.val().trim() !== "";

            aplicarEstilosYMensaje(patenteInput, patenteValida, "Patente no válida.");
            aplicarEstilosYMensaje(dniDuenioInput, dniValido, "DNI no válido.");
            aplicarEstilosYMensaje(modeloInput, modeloValido, "Modelo requerido.");
            
            // Validar y aplicar estilos a los campos marca
            aplicarEstilosYMensaje(marcaInput, marcaNoVacia, "Campo requerido.");

            if (!patenteValida || !dniValido || !modeloValido || !marcaNoVacia) {
                event.preventDefault(); // Evitar el envío del formulario si no es válido
            }
        });

        // Aplicar estilos y mensajes cuando se cambian los valores de los campos
        $('#patente').on('input', function() {
            aplicarEstilosYMensaje($(this), validarPatente($(this).val()), "Patente no válida.");
        });

        $('#dniDuenio').on('input', function() {
            aplicarEstilosYMensaje($(this), validarDNI($(this).val()), "DNI no válido.");
        });

        // Validar y aplicar estilos cuando se cambia el valor del campo modelo
        $('#modelo').on('input', function() {
            aplicarEstilosYMensaje($(this), validarModelo($(this).val()), "Modelo (año).");
        });

        // Validar y aplicar estilos cuando se cambia el valor del campo marca
        $('#marca').on('input', function() {
            aplicarEstilosYMensaje($(this), $(this).val().trim() !== "", "Campo requerido.");
        });
    });
    </script>
</body>

</html>