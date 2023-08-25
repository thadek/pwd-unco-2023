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

<div class="container col-sm-12 col-md-8 col-lg-8 col-xl-8 mb-8">
    <div class="form-control mt-6 cusForm">
        <h3>La película introducida es:</h3>
        <p class="cusP fs-4">
            Título: <?php echo $_GET['titulo']; ?><br>
            Actores: <?php echo $_GET['actores']; ?><br>
            Director: <?php echo $_GET['director']; ?><br>
            Guión: <?php echo $_GET['guion']; ?><br>
            Producción: <?php echo $_GET['produccion']; ?><br>
            Año: <?php echo $_GET['anio']; ?><br>
            Nacionalidad: <?php echo $_GET['nacionalidad']; ?><br>
            Género: <?php echo $_GET['genero']; ?><br>
            Duración: <?php echo $_GET['duracion']; ?> min<br>
            Restricciones de edad: <?php echo $_GET['textoEdad']; ?><br>
            Sinopsis: <?php echo $_GET['sinopsis']; ?>
        </p>
        <img src="../control/archivos_imagen/<?php echo $_GET['imagen']; ?>" alt="Imagen de la película" class="img-fluid">
    </div>
    <button class="btn btn-primary mt-4" onclick="window.location.href='./subir_imagen.php'">Volver</button>
</div>

</body>
</html>
