<?php

if ($_GET){
    $lun = $_GET['num_form1'];
    $mar = $_GET['num_form2'];
    $mie = $_GET['num_form3'];
    $jue = $_GET['num_form4'];
    $vie = $_GET['num_form5'];
    $sab = $_GET['num_form6'];
    $dom = $_GET['num_form7'];
    $arreglo[0] = $lun;
    $arreglo[1] = $mar;
    $arreglo[2] = $mie;
    $arreglo[3] = $jue;
    $arreglo[4] = $vie;
    $arreglo[5] = $sab;
    $arreglo[6] = $dom;
        
    $sumatoria = $lun + $mar + $mie + $jue + $vie + $sab + $dom;
    echo "Total de horas cursadas por semana: ".$sumatoria;
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