<?php

if ($_POST){

    $num1 = $_POST['num1_form'];
    $num2 = $_POST['num2_form'];
    $calculadora = $_POST['calculadora_form'];

    switch ($calculadora){
        case 1:
            $resultado = $num1 + $num2;
            $operacion = "suma";
            break;
        case 2:
            $resultado = $num1 - $num2;
            $operacion = "resta";
            break;
        case 3:
            $resultado = $num1 * $num2;
            $operacion = "multiplicaci&oacute;n";
            break;
    }
    echo "<h2>El resultado es: ".$resultado." con la operaci&oacute;n ".$operacion."</h2>";
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