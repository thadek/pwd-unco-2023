<!DOCTYPE html>
<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <?php

            if($_GET){
                presentar($_GET['nombre'], $_GET['apellido'], $_GET['edad'], $_GET['direccion'], $_GET['nivelEstudio'], $_GET['sexo']);
            }

            if (isset($_GET['deportes'])) {
                $deportesSeleccionados = $_GET['deportes'];
                $cantidadDeportes = count($deportesSeleccionados);
            
                echo "\nCantidad de deportes seleccionados: " . $cantidadDeportes;
            }

            function presentar($nombre, $apellido, $edad, $direccion, $nivel, $sexo){
                echo "Hola, yo soy " . $nombre . ", " . $apellido . ", tengo " . $edad . " años y vivo en " . $direccion . "\n";
                echo "\nSexo: " . $sexo . 
                "\nNivel Estudio: " . $nivel . "\n";

                $anios = $_GET['edad'];

                if($anios<18){
                    echo "\nSoy menor de edad\n";
                }else{
                    echo "\nSoy mayor de edad\n";
                }



            }


        ?>
    </body>
</html>