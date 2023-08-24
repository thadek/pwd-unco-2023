<?php 
include_once "../../control/Numero.php";

if($_POST){
    $numero = new Numero($_POST["f_num"]);
    $contenido = $numero->comparar();
}else{
    $contenido = "No se ingreso ningún dato.";
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver numero ingresado</title>
    <link rel="stylesheet" href="..\css\estilos.css">
</head>
<body>

<div id="navbar"></div>

<div class="contenedor columna">

    <p class="texto_simple">
    <?php
     echo $contenido;
    ?>
    </p>
    <button class="boton" onclick="volver()">Volver</button>
</div>
    
</body>
<script src="/tp1/vista/js/navegacion.js"></script>
<script type="text/javascript">
    const volver = () =>{
        window.location.href = "/tp1/vista/ejercicio1.html";
    }
</script>
</html>