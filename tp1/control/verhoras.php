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
    <?php
        if($_GET){
            sumarHoras($_GET['lunes'], $_GET['martes'], $_GET['miercoles'], $_GET['jueves'], $_GET['viernes']);
        }

        function sumarHoras($lun, $mar, $mie, $jue, $vie){
            $horasSemanales = 0;
            $horasSemanales = $lun + $mar + $mie + $jue + $vie;

            echo <<<CONT
            <div class="contenedor columna">
            <p class="texto_simple">  La cantidad de horas semanales es de: $horasSemanales  </p>
            <button class="boton" onclick="volver()">Volver</button>
            </div>
           
           
            CONT;
        }
    ?>

    </body>
    <script src="/tp1/vista/js/navegacion.js"></script>
    <script type="text/javascript">
    const volver = () =>{
        window.location.href = "/tp1/vista/ejercicio2.html";
    }
</script>
</html>