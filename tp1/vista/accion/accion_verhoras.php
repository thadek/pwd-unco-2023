<?php

include_once "../../control/Tiempo.php";
if($_GET){
   $resultado = Tiempo::sumarHoras($_GET['lunes'], $_GET['martes'], $_GET['miercoles'], $_GET['jueves'], $_GET['viernes']);
   $contenido = " La cantidad de horas semanales es de: $resultado";
}else{
    $contenido = "No se ingreso ningún dato.";
}


?>


<!DOCTYPE html>
<html>
    <head>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tp1/vista/css/estilos.css">
        <title>
            Ver cantidad de horas semanales
        </title>
    </head>
    <body>

    <div id="navbar"></div>

    <div class="contenedor columna">
    <p class="texto_simple">
    <?php
    echo $contenido;
    ?>
    <button class="boton" onclick="volver()">Volver</button>
    </p>

     </div>
   

    </body>
    <script src="/tp1/vista/js/navegacion.js"></script>
    <script type="text/javascript">
    const volver = () =>{
        window.location.href = "/tp1/vista/ejercicio2.html";
    }
</script>
</html>