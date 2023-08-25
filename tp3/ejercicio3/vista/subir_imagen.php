<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Pelicula</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body class="blueBody">
    <div class="container col-sm-12 col-md-7 col-lg-7 col-xl-7 mb-4" >
        <form id="form1" class="row g-2 mt-4 d-flex align-items-center justify-content-center" method="post" action="./accion/accion_pelicula.php" enctype="multipart/form-data" onSubmit="return Validar();">

            <div>
                <h3><span><i class="bi bi-pencil-square"></i></span> Cinem@s</h3>
            </div>

            <div class="col-md-5 pe-4">
                <label for="titulo_form" class="form-label cusLabel">T&iacute;tulo:</label>
                <input type="text" class="form-control" placeholder="Título" name="titulo_form" id="titulo_form">
                <p id="p1"></p>
            </div>

            <div class="col-md-5 ps-4">
                <label for="actores_form" class="form-label cusLabel">Actores:</label>
                <input type="text" class="form-control" placeholder="Actores" name="actores_form" id="actores_form">
                <p id="p2"></p>
            </div>

            <div class="col-md-5 pe-4">
                <label for="director_form" class="form-label cusLabel">Director:</label>
                <input type="text" class="form-control" placeholder="Director" name="director_form" id="director_form">
                <p id="p3"></p>
            </div>

            <div class="col-md-5 ps-4">
                <label for="guion_form" class="form-label cusLabel">Gui&oacute;n:</label>
                <input type="text" class="form-control" placeholder="Guión" name="guion_form" id="guion_form">
                <p id="p4"></p>
            </div>

            <div class="col-md-5 pe-4">
                <label for="produccion_form" class="form-label cusLabel">Producci&oacute;n:</label>
                <input type="text" class="form-control" name="produccion_form" id="produccion_form">
                <p id="p5"></p>
            </div>

            <div class="col-md-5 ps-4">
                <label for="anio_form" class="form-label cusLabel">A&ntilde;o:</label>
                <input type="text" class="form-control" name="anio_form" id="anio_form">
                <p id="p6"></p>
            </div>

            <div class="col-md-5 pe-4">
                <label for="nacionalidad_form" class="form-label cusLabel">Nacionalidad:</label>
                <input type="text" class="form-control" name="nacionalidad_form" id="nacionalidad_form">
                <p id="p7"></p>
            </div>

            <div id="genero" class="col-md-5 ps-4">
                <label for="genero_form" class="form-label cusLabel ">G&eacute;nero:</label>
                <select class="form-select cusLabel" name="genero_form" id="genero_form">
                    <option value="0" selected>-Seleccionar-</option>
                    <option value="1">Acci&oacute;n</option>
                    <option value="2">Comedia</option>
                    <option value="3">Terror</option>
                    <option value="4">Drama</option>
                </select>
                <p id="p8"></p>
            </div>

            <div class="col-md-5 pe-4">
                <label for="duracion_form" class="form-label cusLabel">Duraci&oacute;n:</label>
                <input type="text" class="form-control" name="duracion_form" id="duracion_form">
                <p class="cusP">(Minutos)</p><p id="p9"></p>
            </div>

            <div class="col-md-5 ps-4">
                <label class="form-label cusLabel">Restricciones de edad:</label><br/>
                <div class="form-check form-check-inline">
                    <input checked class="form-check-input" type="radio" name="resEdad_form" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Todo p&uacute;blico</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="resEdad_form" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">Mayores de 7 a&ntilde;os</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="resEdad_form" id="inlineRadio3" value="3">
                    <label class="form-check-label" for="inlineRadio3">Mayores de 18 a&ntilde;os</label>
                </div>
            </div>

            <div class="col-md-10">
                <label for="sinopsis_form" class="form-label cusLabel">Sinopsis:</label>
                <textarea rows="3" class="form-control" name="sinopsis_form" id="sinopsis_form"></textarea>
                <p id="p10"></p>
            </div>

                      <!-- para insertar la imagen.-->
            <div class="col-md-5 pe-4">
                <label for="imagen_form" class="form-label cusLabel">Imagen:</label>
                <input type="file" class="form-control" name="imagen_form" id="imagen_form" accept=".jpg, .jpeg, .png" required>
                <p id="p11"></p>
            </div>


            <div class="d-flex align-items-center justify-content-end mb-3 me-3">
                <button type="submit" class="btn btn-primary m-1" id="submit">Enviar</button>
                <button type="reset" class="btn btn-secondary m-1">Borrar</button>
            </div>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script>
        function Validar(){
            let resp = true;
            const tituloVal = $("#titulo_form").val();
            const actoresVal = $("#actores_form").val();
            const directorVal = $("#director_form").val();
            const guionVal = $("#guion_form").val();
            const produccionVal = $("#produccion_form").val();
            const anioVal = $("#anio_form").val();
            const nacionalidadVal = $("#nacionalidad_form").val();
            const generoVal = $("#genero_form").val();
            const duracionVal = $("#duracion_form").val();
            const resEdadVal = $("resEdad_form").val();
            const sinopsisVal = $("#sinopsis_form").val();
            const imagenInput = document.getElementById('imagen_form');
            const imagenFile = imagenInput.files[0];

            
            if (!imagenFile) {
                $("#p11").text("Por favor, seleccione una imagen.");
                resp = false;
            } else {
                const allowedExtensions = ['.jpg', '.jpeg', '.png'];
                const imagenFileName = imagenFile.name;
                const imagenExtension = imagenFileName.substring(imagenFileName.lastIndexOf('.')).toLowerCase();

                if (allowedExtensions.indexOf(imagenExtension) === -1) {
                    $("#p11").text("La extensión del archivo de imagen no es válida. Use .jpg, .jpeg o .png.");
                    resp = false;
                } else {
                    $("#p11").text("");
                }
            }


            if (tituloVal != ""){
                $("#titulo_form").css("border", "1px solid #ced4da");
                $("#p1").text("");
            } else {
                $("#titulo_form").css("border", "2px solid red");
                $("#p1").text("Por favor ingrese un título");
                $("#titulo_form").focus();
                resp = false;
            }

            if (actoresVal != ""){
                $("#actores_form").css("border", "1px solid #ced4da");
                $("#p2").text("");
            } else {
                $("#actores_form").css("border", "2px solid red");
                $("#p2").text("Por favor ingrese los actores");
                $("#actores_form").focus();
                resp = false;
            }

            if (directorVal != ""){
                $("#director_form").css("border", "1px solid #ced4da");
                $("#p3").text("");
            } else {
                $("#director_form").css("border", "2px solid red");
                $("#p3").text("Por favor ingrese el director");
                $("#director_form").focus();
                resp = false;
            }

            if (guionVal != ""){
                $("#guion_form").css("border", "1px solid #ced4da");
                $("#p4").text("");
            } else {
                $("#guion_form").css("border", "2px solid red");
                $("#p4").text("Por favor ingrese el guión");
                $("#guion_form").focus();
                resp = false;
            }

            if (produccionVal != ""){
                $("#produccion_form").css("border", "1px solid #ced4da");
                $("#p5").text("");
            } else {
                $("#produccion_form").css("border", "2px solid red");
                $("#p5").text("Por favor ingrese la producción");
                $("#produccion_form").focus();
                resp = false;
            }

            if (anioVal != ""){
                $("#anio_form").css("border", "1px solid #ced4da");
                $("#p6").text("");
            } else {
                $("#anio_form").css("border", "2px solid red");
                $("#p6").text("Por favor ingrese el año");
                $("#anio_form").focus();
                resp = false;
            }
            
            if ($.isNumeric(anioVal) && anioVal.length <= 4){
                $("#anio_form").css("border", "1px solid #ced4da");
                $("#p6").text("");
            } else if (anioVal != ""){
                $("#anio_form").css("border", "2px solid red");
                $("#p6").text("Por favor ingrese un año válido");
                $("#anio_form").focus();
                resp = false;
            }

            if (nacionalidadVal != ""){
                $("#nacionalidad_form").css("border", "1px solid #ced4da");
                $("#p7").text("");
            } else {
                $("#nacionalidad_form").css("border", "2px solid red");
                $("#p7").text("Por favor ingrese la nacionalidad");
                $("#nacionalidad_form").focus();
                resp = false;
            }

            if (generoVal != 0){
                $("#genero_form").css("border", "1px solid #ced4da");
                $("#p8").text("");
            } else {
                $("#genero_form").css("border", "2px solid red");
                $("#p8").text("Por favor ingrese el género");
                $("#genero_form").focus();
                resp = false;
            }

            if (duracionVal != ""){
                $("#duracion_form").css("border", "1px solid #ced4da");
                $("#p9").text("");
            } else {
                $("#duracion_form").css("border", "2px solid red");
                $("#p9").text("Por favor ingrese la duración");
                $("#duracion_form").focus();
                resp = false;
            }

            if ($.isNumeric(duracionVal) && duracionVal.length <= 3){
                $("#duracion_form").css("border", "1px solid #ced4da");
                $("#p9").text("");
            } else if (anioVal != ""){
                $("#duracion_form").css("border", "2px solid red");
                $("#p9").text("Por favor ingrese una duración válida");
                $("#duracion_form").focus();
                resp = false;
            }

            if (sinopsisVal != ""){
                $("#sinopsis_form").css("border", "1px solid #ced4da");
                $("#p10").text("");
            } else {
                $("#sinopsis_form").css("border", "2px solid red");
                $("#p10").text("Por favor ingrese la sinopsis");
                $("#sinopsis_form").focus();
                resp = false;
            }

            return resp;
        }

        function soloLetrasYNumeros(actores) {
            return /^[A-Za-z0-9]*$/.test(actores);
        }
    </script>
</body>
</html>
