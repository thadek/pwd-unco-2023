<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contenido del Archivo de Texto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Contenido del Archivo de Texto</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Comprobamos si se ha subido un archivo
            if (isset($_FILES['archivo'])) {
                $archivo = $_FILES['archivo'];

                // Verificamos el tipo del archivo (debe ser .txt)
                $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
                if (strtolower($extension) === 'txt') {
                    // Leemos y mostramos el contenido del archivo
                    $contenido = file_get_contents($archivo['tmp_name']);
                    echo "<textarea class='form-control' rows='10'>$contenido</textarea>";
                } else {
                    echo "<div class='alert alert-danger'>Tipo de archivo no válido. Solo se permite archivo de texto (.txt).</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>No se ha seleccionado ningún archivo.</div>";
            }
        }
        ?>
        <br>
        <a href="./formulario.html" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>
