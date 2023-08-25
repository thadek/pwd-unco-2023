<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Subida</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Resultado de Subida</h1>
        <?php
        if (isset($_GET['archivo'])) {
            $nombreArchivo = $_GET['archivo'];

            echo "<p>El archivo '$nombreArchivo' se ha subido correctamente.</p>";
            echo "<p>Puedes acceder al archivo haciendo clic en el siguiente enlace:</p>";
            echo "<a href='../control/archivos/$nombreArchivo'>$nombreArchivo</a>";
        } elseif (isset($_GET['error'])) {
            $mensajeError = $_GET['error'];
            echo "<div class='alert alert-danger'>$mensajeError</div>";
        } else {
            echo "<p>No se ha seleccionado ningún archivo.</p>";
        }
        ?>
        <br>
        <a href="subir_archivo.php" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>
