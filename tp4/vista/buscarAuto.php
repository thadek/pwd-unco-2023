<!DOCTYPE html>
<html>

<head>
    <title>Buscar Auto - Grupo 8</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/inicio.css">
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
    <style>
        .error-message {
            color: red;
            margin-top: 5px;
        }
        .error-field {
            border: 2px solid red;
        }
    </style>
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
                    <div class="col col-sinp">
                        <div class="img-autos"></div>
                    </div>
                    <div class="col d-flex text-center flex-column align-items-center justify-content-center ">
                        <h4>Buscar Auto por Patente</h4>
                        <form action="./accion/accionBuscarAuto.php" method="post" id="searchForm">
                            <div class="input-group">
                                <input class="form-control p-3" type="text" placeholder="Código de patente" id="patente" name="patente" >
                                <input class="btn btn-light p-3" type="submit" value="Buscar">
                            </div>
                            <span class="error-message" id="patenteError"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="contenedor">
    </div>
    <?php
    include_once("../estructura/Footer.php");
    ?>
    <script>
        $(document).ready(function () {
            $("#searchForm").submit(function (event) {
                var patenteValue = $("#patente").val();
                
                // Expresión regular para validar la patente (ejemplo: ADC 123)
                var patenteRegex = /^[A-Z]{3}\s\d{3}$/;
                
                // Verifica si el valor de la patente coincide con la expresión regular
                if (!patenteRegex.test(patenteValue)) {
                    // Muestra un mensaje de error junto al campo de entrada
                    $("#patenteError").text("Por favor, ingresa una patente válida (ejemplo: ADC 123)");
                    
                    // Agrega una clase para resaltar el campo de entrada con borde rojo
                    $("#patente").addClass("error-field");
                    
                    // Evita que el formulario se envíe
                    event.preventDefault();
                } else {
                    // Limpia el mensaje de error y elimina la clase de error si el valor es válido
                    $("#patenteError").text("");
                    $("#patente").removeClass("error-field");
                }
            });
        });
    </script>
</body>

</html>