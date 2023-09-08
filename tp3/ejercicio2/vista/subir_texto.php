<!DOCTYPE html>
<html>
<head>
    <title>Subir Archivo de Texto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Subir Archivo de Texto</h1>
        <form action="./accion/accion_subirtexto.php" method="POST" enctype="multipart/form-data" onsubmit="return validarArchivo();">
            <div class="form-group">
                <label for="archivo">Seleccionar archivo de texto:</label>
                <input type="file" class="form-control-file" name="archivo" id="archivo" accept=".txt" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir Archivo de Texto</button>
        </form>
    </div>

    <script>
        function validarArchivo() {
            // Obtenemos el elemento de archivo y su valor
            var archivoInput = document.getElementById('archivo');
            var archivo = archivoInput.files[0];

            // Verificamos si se seleccionó un archivo
            if (!archivo) {
                alert("Por favor, seleccione un archivo de texto.");
                return false;
            }

            // Verificamos la extensión del archivo
            var extensionesPermitidas = [".txt"];
            var archivoNombre = archivo.name;
            var archivoExtension = archivoNombre.substring(archivoNombre.lastIndexOf('.')).toLowerCase();
            if (extensionesPermitidas.indexOf(archivoExtension) === -1) {
                alert("La extensión del archivo no es válida. Se permite solo archivos de texto (.txt).");
                return false;
            }

            // Si todas las validaciones pasan, permitimos el envío del formulario
            return true;
        }
    </script>
</body>
</html>
