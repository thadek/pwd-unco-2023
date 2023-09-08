<?php

include_once "../../control/Pelicula.php";
include_once "../../utils/functions.php";
include_once "../../control/SubirImagen.php";

$datos = darDatosSubmitted();

if ($_POST) {
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

    // Obtener el texto de restricción de edad
    $textoEdad = $pelicula->devolverRestriccionEdad();

    // Subir la imagen
    // Crear una instancia de la clase SubirImagen
    $subirImagen = new SubirImagen();

    // Subir la imagen y obtener el nombre único
    $imagenNombreUnico = $subirImagen->subir($_FILES['imagen_form']);

    if ($imagenNombreUnico) {
        // La imagen se subió correctamente, puedes guardar $imagenNombreUnico en la base de datos si es necesario
        $pelicula->setImagen($imagenNombreUnico);
    } else {
        // Manejar errores en caso de que la subida de la imagen falle
        $errorMensaje = "Hubo un error al subir la imagen. Por favor, inténtalo de nuevo.";
        header("Location: formulario.php?error=" . urlencode($errorMensaje));
        exit;
    }


    // Crear un arreglo con los datos para pasar a resultados.php
    $resultado = [
        'titulo' => $pelicula->getTitulo(),
        'actores' => $pelicula->getActores(),
        'director' => $pelicula->getDirector(),
        'guion' => $pelicula->getGuion(),
        'produccion' => $pelicula->getProduccion(),
        'anio' => $pelicula->getAnio(),
        'nacionalidad' => $pelicula->getNacionalidad(),
        'genero' => $pelicula->getGenero(),
        'duracion' => $pelicula->getDuracion(),
        'textoEdad' => $textoEdad,
        'sinopsis' => $pelicula->getSinopsis(),
        'imagen' => $pelicula->getImagen(),
    ];

    // Redireccionar a resultados.php con los datos
    header("Location: ../resultados_pelicula.php?" . http_build_query($resultado));
    exit;
}