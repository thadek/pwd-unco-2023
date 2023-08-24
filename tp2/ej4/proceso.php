<?php

if ($_POST){

    $titulo = $_POST['titulo_form'];
    $actores = $_POST['actores_form'];
    $director = $_POST['director_form'];
    $guion = $_POST['guion_form'];
    $produccion = $_POST['produccion_form'];
    $anio = $_POST['anio_form'];
    $nacionalidad = $_POST['nacionalidad_form'];
    $genero = $_POST['genero_form'];
    $duracion = $_POST['duracion_form'];
    $resEdad = $_POST['resEdad_form'];
    $sinopsis = $_POST['sinopsis_form'];

    switch ($resEdad){
        case 1:
            $textoEdad = "Todo p&uacute;blico";
            break;
        case 2:
            $textoEdad = "Mayores de 7 a&ntilde;os";
            break;
        case 3:
            $textoEdad = "Mayores de 18 a&ntilde;os";
            break;
    }

    echo '<body>
    <div class="container col-sm-12 col-md-8 col-lg-8 col-xl-8 mb-8" >
        <div class="form-control mt-6 cusForm">
            <h3>La pel&iacute;cula introducida es:</h3>
            <p class="cusP fs-4">
                T&iacute;tulo: '.$titulo.'<br/>
                Actores: '.$actores.'<br/>
                Director: '.$director.'<br/>
                Gui&oacute;n: '.$guion.'<br/>
                Producci&oacute;n: '.$produccion.'<br/>
                A&ntilde;o: '.$anio.'<br/>
                Nacionalidad: '.$nacionalidad.'<br/>
                G&eacute;nero: '.$genero.'<br/>
                Duraci&oacute;n: '.$duracion.'min<br/>
                Restricciones de edad: '.$textoEdad.'<br/>
                Sinopsis: '.$sinopsis.'
            </p>
        </div>
    </div>
</body>';
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body></body>
</html>