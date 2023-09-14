<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cambio de Dueño de Auto</title>
    <style>
    .error {
        border: 1px solid red;
        color: red;
        background-color: #ffebeb; /* Color de fondo en rojo claro */
    }
    .error-message {
        color: red;
    }
    </style>
    <script src="js/jquery.js"></script>
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
    <h1>Cambio de Dueño de Auto</h1>

    <form id="cambioDueñoForm" method="post" action="accion/accionCambioDuenio.php">
        <label for="patente">Patente del Auto:</label>
        <input type="text" id="patente" name="patente">
        <span id="patenteMessage"></span><br><br>

        <label for="nroDni">Número de DNI del Nuevo Dueño:</label>
        <input type="text" id="nroDni" name="nroDni">
        <span id="nroDniMessage"></span><br><br>

        <input type="submit" value="Cambiar Dueño">
    </form>

    <script>
$(document).ready(function() {
    // Al cargar la página, eliminamos las clases de error y los mensajes de error
    $("form input").removeClass("error");
    $("span.error-message").remove();

    // Al enviar el formulario, realizamos la validación
    $("#cambioDueñoForm").submit(function(event) {
        // Eliminamos las clases de error y los mensajes de error previos
        $("form input").removeClass("error");
        $("span.error-message").remove();

        // Validación del campo de Patente (puede personalizar su propia lógica de validación)
        var patente = $("#patente").val().trim();
        if (patente === "") {
            $("#patente").addClass("error");
            $("#patente").after('<span class="error-message">Este campo es requerido.</span>');
        }

        // Validación del campo de NroDNI
        var nroDni = $("#nroDni").val().trim();
        if (nroDni === "") {
            $("#nroDni").addClass("error");
            $("#nroDni").after('<span class="error-message">Este campo es requerido.</span>');
        } else if (!/^\d+$/.test(nroDni) || nroDni.length !== 8) {
            $("#nroDni").addClass("error");
            $("#nroDni").after('<span class="error-message">Ingrese un DNI válido de 8 dígitos.</span>');
        } else {
            // Si no hay errores en el campo de NroDNI, podemos continuar con el envío del formulario
            return true;
        }

        // Evita el envío del formulario si hay errores
        event.preventDefault();
    });
});
</script>
</body>
</html>