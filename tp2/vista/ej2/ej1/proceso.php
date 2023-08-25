<?php

if ($_POST){

    $numero = $_POST['num_form'];
    
    if ($numero == 0){
        $texto = " cero.";
    } else if ($numero > 0){
            $texto = " positivo.";
    } else $texto = " negativo.";
    echo "El número ingresado fue:".$texto;
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