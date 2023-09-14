<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buscar Persona</title>
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
    <h1>Buscar Persona</h1>
    <form action="accion/accionBuscarPersona.php" method="POST" id="searchForm">
        <label for="nroDni">Número de Documento:</label>
        <input type="text" id="nroDni" name="nroDni" >
        <span class="error-message" id="nroDniError"></span>
        <br>
        <input type="submit"  value="Buscar">
    </form>

    </main>
    <div class="contenedor">
    </div>
    <?php include_once("../estructura/Footer.php"); ?>

    <script>
        $(document).ready(function () {
            $("#searchForm").submit(function (event) {
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
        $(document).ready(function () {
        $("#searchForm").submit(function (event) {
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