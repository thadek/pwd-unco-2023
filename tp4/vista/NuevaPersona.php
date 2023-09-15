<!DOCTYPE html>
<html>

<head>
    <title>Nueva Persona</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/inicio.css">


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
                        <div class="img-personas"></div>
                    </div>
                    <div class="col d-flex text-center flex-column align-items-center justify-content-center p-5 ">
                        

                        <form action="./accion/accionNuevaPersona.php" class="d-flex flex-column gap-3" style="width:60%" method="post">
                        <h4>Agregar una nueva persona</h4>
                        
                       
                            <input class="form-control p-3" type="text" id="nroDni" name="nroDni" placeholder="Nro. de DNI" required>
                            <span id="pDni"></span>

                            <input class="form-control p-3" type="text" id="apellido" name="apellido" placeholder="Apellido" required>
                            <span id="pApellido"></span>

                           
                            <input class="form-control p-3"  type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                            <span id="pNombre"></span>
 
                            <input class="form-control p-3" type="text" id="fechaNac" name="fechaNac" placeholder="Fecha de nacimiento (DD/MM/YYYY) ">
                            <span id="pFechaNac"></span>

                            <input class="form-control p-3" type="text" id="telefono" name="telefono" placeholder="Teléfono" required>
                            <span id="pTelefono"></span>

                            <input class="form-control p-3" type="text" id="domicilio" name="domicilio" placeholder="Domicilio" required>
                            <span id="pDomicilio"></span>


                            <input class="btn btn-light p-3" type="submit" onclick="verificar();" value="Agregar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="contenedor">
    </div>
    <?php include_once("../estructura/Footer.php"); ?>


</body>
<script>
    function verificar() {
        let resp = true;

        let dni = parseInt(document.getElementById('nroDni').value);
        let apellido = document.getElementById('apellido').value;
        let nombre = document.getElementById('nombre').value;
        let fechaNac = document.getElementById('fechaNac').value;
        let telefono = parseInt(document.getElementById('telefono').value);
        let domicilio = document.getElementById('domicilio').value;

        // Función para validar el DNI del dueño
        function validarDNI(dni) {
            return /^\d{8}$/.test(dni);
        }



        if (isNaN(dni) || !validarDNI(dni)) {
            document.getElementById('nroDni').style.border = "1px solid red";
            document.getElementById('pDni').style.color = "red"
            document.getElementById('pDni').innerHTML = 'Ingrese un DNI valido';
            event.preventDefault();
            resp = false;
        } else {
            document.getElementById('nroDni').style.border = "1px solid green"
        }

        if (apellido == "") {
            document.getElementById('apellido').style.border = "1px solid red";
            document.getElementById('pApellido').style.color = "red"
            document.getElementById('pApellido').innerHTML = 'Ingrese un apellido';
            event.preventDefault();
            resp = false;
        } else {
            document.getElementById('apellido').style.border = "1px solid green"
        }

        if (nombre == "") {
            document.getElementById('nombre').style.border = "1px solid red";
            document.getElementById('pNombre').style.color = "red"
            document.getElementById('pNombre').innerHTML = 'Ingrese un nombre';
            event.preventDefault();
            resp = false;
        } else {
            document.getElementById('nombre').style.border = "1px solid green"
        }

        if (isNaN(telefono)) {
            document.getElementById('telefono').style.border = "1px solid red";
            document.getElementById('pTelefono').style.color = "red"
            document.getElementById('pTelefono').innerHTML = 'Ingrese numero de telefono';
            event.preventDefault();
            resp = false;
        } else {
            document.getElementById('telefono').style.border = "1px solid green"
        }

        if (domicilio == "") {
            document.getElementById('domicilio').style.border = "1px solid red";
            document.getElementById('pDomicilio').style.color = "red"
            document.getElementById('pDomicilio').innerHTML = 'Ingrese un domicilio';
            event.preventDefault();
            resp = false;
        } else {
            document.getElementById('domicilio').style.border = "1px solid green"
        }

        if (!validarFecha(fechaNac)) {
            document.getElementById('fechaNac').style.border = "1px solid red";
            document.getElementById('pFechaNac').style.color = "red"
            document.getElementById('pFechaNac').innerHTML = 'Ingrese una fecha valida';
            event.preventDefault();
            resp = false;
        } else {
            document.getElementById('fechaNac').style.border = "1px solid green"
        }

        return resp
    }

    function validarFecha(fecha) {
        var partes = fecha.split("/");
        if (partes.length !== 3) {
            return false; // No tiene el formato esperado (deben haber tres partes separadas por "/")
        }

        var dia = parseInt(partes[0], 10);
        var mes = parseInt(partes[1], 10);
        var año = parseInt(partes[2], 10);

        // Verificar si es una fecha válida
        var fechaValida = new Date(año, mes - 1, dia); // Restar 1 al mes (enero es 0)

        return (
            año === fechaValida.getFullYear() &&
            mes - 1 === fechaValida.getMonth() &&
            dia === fechaValida.getDate()
        );
    }
</script>

</html>