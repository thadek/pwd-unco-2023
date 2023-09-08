<!DOCTYPE html>
<html>
<head>
    <title>Subir Archivo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function validarArchivo() {
            // Obtenemos el elemento de archivo y su valor
            var archivoInput = document.getElementById('archivo');
            var archivo = archivoInput.files[0];

            // Verificamos si se seleccionó un archivo
            if (!archivo) {
                alert("Por favor, seleccione un archivo.");
                return false;
            }

            // Verificamos la extensión del archivo
            var extensionesPermitidas = [".doc", ".pdf"];
            var archivoNombre = archivo.name;
            var archivoExtension = archivoNombre.substring(archivoNombre.lastIndexOf('.')).toLowerCase();
            if (extensionesPermitidas.indexOf(archivoExtension) === -1) {
                alert("La extensión del archivo no es válida. Se permiten archivos .doc o .pdf.");
                return false;
            }

            // Verificamos el tamaño del archivo (en bytes)
            var tamanoMaximo = 2 * 1024 * 1024; // 2 MB
            if (archivo.size > tamanoMaximo) {
                alert("El tamaño del archivo es demasiado grande. El tamaño máximo permitido es de 2 MB.");
                return false;
            }

            // Si todas las validaciones pasan, permitimos el envío del formulario
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Subir Archivo</h1>
        <form action="./accion/accion.php" method="POST" enctype="multipart/form-data" onsubmit="return validarArchivo();">
            <div class="form-group">
                <label for="archivo">Seleccionar archivo:</label>
                <input type="file" class="form-control-file" name="archivo" id="archivo" accept=".doc, .pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir Archivo</button>
        </form>
    </div>
</body>
</html>
