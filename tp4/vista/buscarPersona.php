<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Buscar Persona</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/inicio.css">
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
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
                        <div class="img-personaAbs"></div>
                    </div>
                    <div class="col d-flex text-center flex-column align-items-center justify-content-center ">


                        <form action="accion/accionBuscarPersona.php" class="d-flex flex-column gap-3" style="width:60%" method="POST" id="searchForm">
                            <h4>Buscar Persona</h4>
                            
                            <input  class="form-control p-3" type="text" id="nroDni" placeholder="Número de DNI" name="nroDni">
                            <span class="error-message" id="nroDniError"></span>
                         
                            <input class="btn btn-light p-3" type="submit" value="Buscar">
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
            $("#searchForm").submit(function(event) {
                var nroDniValue = $("#nroDni").val();

                // Expresión regular para validar el número de documento (solo dígitos)
                var dniRegex = /^\d+$/;

                // Verifica si el valor del número de documento coincide con la expresión regular
                if (!dniRegex.test(nroDniValue)) {
                    // Muestra un mensaje de error junto al campo de entrada
                    $("#nroDniError").text("Por favor, ingresa un número de documento válido (solo dígitos).");

                    // Agrega una clase para resaltar el campo de entrada con borde rojo
                    $("#nroDni").addClass("error-field");

                    // Evita que el formulario se envíe
                    event.preventDefault();
                } else {
                    // Limpia el mensaje de error y elimina la clase de error si el valor es válido
                    $("#nroDniError").text("");
                    $("#nroDni").removeClass("error-field");
                }
            });
        });
        $(document).ready(function() {
            $("#searchForm").submit(function(event) {
                var nroDniValue = $("#nroDni").val();

                // Expresión regular para validar el número de documento (exactamente 8 dígitos)
                var dniRegex = /^\d{8}$/;

                // Verifica si el valor del número de documento coincide con la expresión regular
                if (!dniRegex.test(nroDniValue)) {
                    // Muestra un mensaje de error junto al campo de entrada
                    $("#nroDniError").text("Por favor, ingresa un número de documento válido (8 dígitos).");

                    // Agrega una clase para resaltar el campo de entrada con borde rojo
                    $("#nroDni").addClass("error-field");

                    // Evita que el formulario se envíe
                    event.preventDefault();
                } else {
                    // Limpia el mensaje de error y elimina la clase de error si el valor es válido
                    $("#nroDniError").text("");
                    $("#nroDni").removeClass("error-field");
                }
            });
        });
    </script>

</body>

</html>