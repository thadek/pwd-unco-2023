<?php

include_once "../../utils/functions.php";
include_once "../../control/Persona.php";
include_once "../../control/Estudiante.php";


$datos = darDatosSubmitted();
if($_POST){

$persona = new Persona();
$persona->setEdad($datos["edad"]);

//Si es estudiante reescribo la variable persona
if(!empty($datos["estudiante"])){
    $persona = new Estudiante();
    $persona->setEdad($datos["edad"]);
}


$esEstudiante = $persona::isEstudiante($persona) ? "Si" : "No";
$costoEntrada = $persona::calcularEntradaCine($persona);


$contenido =  <<<CONTENIDO
CONDICIÓN: {$persona->getEdad()} años, estudiante: {$esEstudiante}<br>
El costo de la entrada es de {$costoEntrada} pesos</p>
CONTENIDO;
}else{
$contenido = <<<CONTENIDO
No se recibieron datos suficientes para realizar la operación.
CONTENIDO;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tp1/vista/css/estilos.css">
    <title>Resultado</title>
</head>
<body>
<div id="navbar"></div>
<div class="contenedor columna">

<p class="texto_simple">
<?php
echo $contenido;
?>
<br>
<button class="boton" onclick="volver()">Volver</button>
</div>

</body>
<script src="/tp1/vista/js/navegacion.js"></script>
<script type="text/javascript">
    const volver = () =>{
        history.back()
    }
</script>
</html>
