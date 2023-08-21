<?php

if ($_POST){

    $edad = $_POST['edad_form'];
    $estudiante = $_POST['btnradio'];

    if ($estudiante == 1 && $edad >= 12){
        $precio = 180;
    }else if ($estudiante == 1 || $edad < 12){
        $precio = 160;
    }else{
        $precio = 300;
    }
    echo "<h2>El precio es de: $".$precio."</h2>";
}else{
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