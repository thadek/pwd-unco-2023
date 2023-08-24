<?php
include_once("../../utils/functions.php");
include_once("../../control/Numero.php");

$datos = darDatosSubmitted();

if($_POST){

    if(!empty($datos["op1"]) && !empty($datos["op2"]) && !empty($datos["operacion"])){
        $resultado = Numero::operarNumeros($datos["operacion"],$datos["op1"],$datos["op2"]);  
        
        $contenido =  
        <<<CONTENIDO
        Numero 1: {$datos["op1"]} <br> Numero 2: {$datos["op2"]} <br> Operación: {$datos["operacion"]} <br> Resultado es: {$resultado} </p>
        CONTENIDO;   
    }else{
        $contenido = <<<CONTENIDO
        No se recibieron datos suficientes para realizar la operación.
        CONTENIDO;
    }
}else{
    $contenido = <<<CONTENIDO
    No se recibieron datos.
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
    <p class="textosimple">
    <?php
        echo $contenido
    ?>
    </p>
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
