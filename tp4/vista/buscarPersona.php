<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buscar Persona</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="js/jquery.js"></script>
    <style>
        .error-message {
            color: red;
        }
        .error-field {
            border: 2px solid red;
        }
    </style>
</head>

<body>
    <h1>Buscar Persona</h1>
    <form action="accion/accionBuscarPersona.php" method="POST" id="searchForm">
        <label for="nroDni">Número de Documento:</label>
        <input type="text" id="nroDni" name="nroDni" >
        <span class="error-message" id="nroDniError"></span>
        <br>
        <input type="submit"  value="Buscar">
    </form>


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