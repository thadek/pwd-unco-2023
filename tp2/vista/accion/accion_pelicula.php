<?php

include_once "../../control/Pelicula.php";
include_once "../../utils/functions.php";

$datos = darDatosSubmitted();

if ($_POST){

     $pelicula = new Pelicula();
     $pelicula->setTitulo($datos['titulo_form']);
     $pelicula->setActores($datos['actores_form']);
     $pelicula->setDirector($datos['director_form']);
     $pelicula->setGuion($datos['guion_form']);
     $pelicula->setProduccion($datos['produccion_form']);
     $pelicula->setAnio($datos['anio_form']);
     $pelicula->setNacionalidad($datos['nacionalidad_form']);
     $pelicula->setGenero($datos['genero_form']);
     $pelicula->setDuracion($datos['duracion_form']);
     $pelicula->setResEdad($datos['resEdad_form']);
     $pelicula->setSinopsis($datos['sinopsis_form']);

     $textoEdad = $pelicula->devolverRestriccionEdad();
     $contenido = '<body>
    <div class="container col-sm-12 col-md-8 col-lg-8 col-xl-8 mb-8" >
        <div class="form-control mt-6 cusForm">
            <h3>La pel&iacute;cula introducida es:</h3>
            <p class="cusP fs-4">
                T&iacute;tulo: '.$pelicula->getTitulo().'<br/>
                Actores: '.$pelicula->getActores().'<br/>
                Director: '.$pelicula->getDirector().'<br/>
                Gui&oacute;n: '.$pelicula->getGuion().'<br/>
                Producci&oacute;n: '.$pelicula->getProduccion().'<br/>
                A&ntilde;o: '.$pelicula->getAnio().'<br/>
                Nacionalidad: '.$pelicula->getNacionalidad().'<br/>
                G&eacute;nero: '.$pelicula->getGenero().'<br/>
                Duraci&oacute;n: '.$pelicula->getDuracion().'min<br/>
                Restricciones de edad: '.$textoEdad.'<br/>
                Sinopsis: '.$pelicula->getSinopsis().'
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
        <title>Resultado</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/tp2/vista/css/ej4.css">
    </head>
    <body>

    <?php
    echo $contenido;
    ?>


    </body>
</html>