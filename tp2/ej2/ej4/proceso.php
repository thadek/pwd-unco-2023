<?php

if ($_GET){
    $nombre = $_GET['nombre_form'];
    $apellido = $_GET['apellido_form'];
    $edad = $_GET['edad_form'];
    $direccion = $_GET['direccion_form'];

    if ($edad >= 18){
        $textoEdad = "mayor";
    } else {
        $textoEdad = "menor";
    }
    echo "<h2>Hola, yo soy ".$nombre." ".$apellido.", tengo ".$edad." años, vivo en ".$direccion." y soy ".$textoEdad." de edad</h2>";
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