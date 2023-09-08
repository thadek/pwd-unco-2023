<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Subida de Archivo de Texto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Resultado de Subida de Archivo de Texto</h1>
        <?php
        if (isset($_GET['archivo'])) {
            $nombreArchivo = $_GET['archivo'];
            $rutaArchivo = '../control/archivos_texto/' . $nombreArchivo;

            if (file_exists($rutaArchivo)) {
                $contenidoArchivo = file_get_contents($rutaArchivo);

                echo "<p>El archivo '$nombreArchivo' se ha subido correctamente.</p>";
                echo "<h4>Contenido del Archivo:</h4>";
                echo "<textarea class='form-control' rows='10'>$contenidoArchivo</textarea>";
            } else {
                echo "<div class='alert alert-danger'>El archivo '$nombreArchivo' no existe.</div>";
            }
        } elseif (isset($_GET['error'])) {
            $mensajeError = $_GET['error'];
            echo "<div class='alert alert-danger'>$mensajeError</div>";
        } else {
            echo "<p>No se ha seleccionado ningún archivo.</p>";
        }
        ?>
        <br>
        <a href="./subir_texto.php" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>
