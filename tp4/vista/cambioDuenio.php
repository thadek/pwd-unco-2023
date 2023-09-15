<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cambio de Dueño de Auto</title>
    <style>
        .error {
            border: 1px solid red;
            color: red;
            background-color: #ffebeb;
            /* Color de fondo en rojo claro */
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
        
        <div class="card col-12 text-center" data-bs-theme="dark">
            <div class="container text-center">
                <div class="row">
                    <div class="col col-sinp">
                        <div class="img-autos"></div>
                    </div>
                    <div class="col d-flex text-center flex-column align-items-center justify-content-center ">
                    
                    <form id="cambioDuenioForm" class="d-flex flex-column gap-3" method="post" action="accion/accionCambioDuenio.php" style="width:60%;">
                    <h4>Cambio de Dueño de Auto</h4>
                            <input class="form-control p-3 " type="text" placeholder="Código de patente" id="patente" name="patente">
                            <span id="patenteMessage"></span>
                            <input class="form-control p-3 " type="text" id="nroDni" placeholder="Número de DNI del Nuevo Dueño" name="nroDni">
                            <span id="nroDniMessage"></span>

                            <input class="btn btn-light p-3" style="width:100%" type="submit" value="Cambiar Dueño">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="contenedor">
    </div>
    <?php include_once("../estructura/Footer.php"); ?>



    <script>
    $(document).ready(function() {
    // Al cargar la página, eliminamos las clases de error y los mensajes de error
    $("form input").removeClass("error");
    $("span.error-message").remove();

    let error = false;

    // Al enviar el formulario, realizamos la validación
    $("#cambioDuenioForm").submit(function(event) {
        // Eliminamos las clases de error y los mensajes de error previos
        $("form input").removeClass("error");
        $("span.error-message").remove();

        // Validación del campo de Patente
        const patente = $("#patente").val().trim();
        const patentePattern = /^[A-Z]{3}\s\d{3}$/; // Expresión regular para el formato "AAA 111" con letras mayúsculas
        if (patente === "") {
            $("#patente").addClass("error");
            error = true;
            $("#patente").after('<span class="error-message">Este campo es requerido.</span>');
        } else if (!patentePattern.test(patente) || !patente.match(/^[A-Za-z]{3} \d{3}$/)) {
            $("#patente").addClass("error");
            error = true;
            $("#patente").after('<span class="error-message">Ingrese una patente válida en formato "AAA 111".</span>');
        }else{
            // Si la patente es válida, la convertimos a mayúsculas
            $("#patente").val(patente.toUpperCase());
            error=false;
        }

        // Validación del campo de NroDNI
        const nroDni = $("#nroDni").val().trim();
        if (nroDni === "") {
            error = true;
            $("#nroDni").addClass("error");
            $("#nroDni").after('<span class="error-message">Este campo es requerido.</span>');
        } else if (!/^\d+$/.test(nroDni) || nroDni.length !== 8) {
            $("#nroDni").addClass("error");
            error = true;
            $("#nroDni").after('<span class="error-message">Ingrese un DNI válido de 8 dígitos.</span>');
        } 

        // Evita el envío del formulario si hay errores
        if (error){
            event.preventDefault();
        }else{
            return true;
        }
        
    });
});
</script>






</body>

</html>