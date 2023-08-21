<?php

if ($_GET){
    $nombre = $_GET['nombre_form'];
    $apellido = $_GET['apellido_form'];
    $edad = $_GET['edad_form'];
    $direccion = $_GET['direccion_form'];
    $estudios = $_GET['btnradio'];
    $genero = $_GET['genero_form'];

    if ($edad >= 18){
        $textoEdad = "mayor";
    } else {
        $textoEdad = "menor";
    }

    switch ($estudios){
        case 1:
            $textoEstudios = "no poseo estudios";
            break;
        case 2:
            $textoEstudios = "poseo estudios primarios";
            break;
        case 3:
            $textoEstudios = "poseo estudios secundarios";
            break;
    }

    switch ($genero){
        case 1:
            $textoGenero = "masculino";
            break;
        case 2:
            $textoGenero = "femenino";
            break;
        case 3:
            $textoGenero = "no binario";
            break;
    }
    echo "<h2>Hola, yo soy ".$nombre." ".$apellido.", tengo ".$edad." años, vivo en ".$direccion.", soy "
         .$textoEdad." de edad, ".$textoEstudios." y mi g&eacute;nero es ".$textoGenero."</h2>";
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