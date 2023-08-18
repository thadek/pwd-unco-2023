<!DOCTYPE html>
<html>
    <head>
        <meta charset="UFT-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Ver cantidad de horas semanales
        </title>
    </head>
    <body>

    <?php
        if($_GET){
            sumarHoras($_GET['lunes'], $_GET['martes'], $_GET['miercoles'], $_GET['jueves'], $_GET['viernes']);
        }

        function sumarHoras($lun, $mar, $mie, $jue, $vie){
            $horasSemanales = 0;
            $horasSemanales = $lun + $mar + $mie + $jue + $vie;

            echo "la cantidad de horas semanales es de: " . $horasSemanales;
        }
    ?>
    </body>
</html>