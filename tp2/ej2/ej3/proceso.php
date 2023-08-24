<?php

if ($_POST){
    $nombre = $_POST['nombre_form'];
    $apellido = $_POST['apellido_form'];
    $edad = $_POST['edad_form'];
    $direccion = $_POST['direccion_form'];

    echo "<h2>Hola, yo soy ".$nombre." ".$apellido.", tengo ".$edad." años y vivo en ".$direccion."</h2>";
} else {
    echo "No se recibieron datos<br />";
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <a class="btn btn-primary" href="index.html" role="button">Volver</a>
    </body>
</html>