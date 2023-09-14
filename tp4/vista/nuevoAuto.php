<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Auto</title>
    <link rel="stylesheet" href="./css/validacion.css">
    <script src="js/jquery.js"></script>
</head>
<body>
<h1>Registrar Nuevo Auto</h1>
<form action="accion/accionNuevoAuto.php" method="post" id="autoForm">
    <div class="form-group">
        <label for="patente">Número de Patente:</label>
        <input type="text" id="patente" name="patente">
        <span class="error-message" id="patente-error"></span>
    </div>

    <div class="form-group">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca">
        <span class="error-message" id="marca-error"></span>
    </div>

    <div class="form-group">
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo">
        <span class="error-message" id="modelo-error"></span>
    </div>

    <div class="form-group">
        <label for="dniDuenio">DNI del Dueño:</label>
        <input type="text" id="dniDuenio" name="dniDuenio">
        <span class="error-message" id="dniDuenio-error"></span>
    </div>

    <input type="submit" value="Registrar Auto">
</form>

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
            var modeloNoVacio = modeloInput.val().trim() !== "";
            var marcaNoVacia = marcaInput.val().trim() !== "";

            aplicarEstilosYMensaje(patenteInput, patenteValida, "Patente no válida. (ejemplo: ABC 123)");
            aplicarEstilosYMensaje(dniDuenioInput, dniValido, "DNI no válido.");
            
            // Validar y aplicar estilos a los campos modelo y marca
            aplicarEstilosYMensaje(modeloInput, modeloNoVacio, "Campo requerido.");
            aplicarEstilosYMensaje(marcaInput, marcaNoVacia, "Campo requerido.");

            if (!patenteValida || !dniValido || !modeloNoVacio || !marcaNoVacia) {
                event.preventDefault(); // Evitar el envío del formulario si no es válido
            }
        });

        // Aplicar estilos y mensajes cuando se cambian los valores de los campos
        $('#patente').on('input', function() {
            aplicarEstilosYMensaje($(this), validarPatente($(this).val()), "Patente no válida. (ejemplo: ABC 123)");
        });

        $('#dniDuenio').on('input', function() {
            aplicarEstilosYMensaje($(this), validarDNI($(this).val()), "DNI no válido.");
        });

        // Validar y aplicar estilos cuando se cambia el valor del campo modelo
        $('#modelo').on('input', function() {
            aplicarEstilosYMensaje($(this), $(this).val().trim() !== "", "Campo requerido.");
        });

        // Validar y aplicar estilos cuando se cambia el valor del campo marca
        $('#marca').on('input', function() {
            aplicarEstilosYMensaje($(this), $(this).val().trim() !== "", "Campo requerido.");
        });
    });
</script>
</body>
</html>