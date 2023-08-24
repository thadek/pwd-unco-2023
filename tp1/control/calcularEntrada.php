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
<?php
if($_POST){

    $edad = $_POST["edad"];
    $estudiante = !empty($_POST["estudiante"]) ? true : false;
    $esEstudiante = $estudiante ? "Si" : "No";
    $costoEntrada = 0;

    if($edad >=12 && $estudiante){
        $costoEntrada = 180;
    }else if($edad < 18 || $estudiante){
        $costoEntrada = 160;
    }else{
        $costoEntrada = 300;
    }
   
    echo <<<CONTENIDO
    <div class="contenedor columna">

    <p class="texto_simple">
    CONDICIÓN: {$edad} años, estudiante: {$esEstudiante}<br>
    El costo de la entrada es de {$costoEntrada} pesos</p>
    <br>
    <button class="boton" onclick="volver()">Volver</button>
    </div>
    CONTENIDO;
}else{
    echo <<<CONTENIDO
    <div class="contenedor">
    <p>No se recibieron datos suficientes para realizar la operación.</p>
    </div>
    CONTENIDO;
  
}


?>
</body>
<script src="/tp1/vista/js/navegacion.js"></script>
<script type="text/javascript">
    const volver = () =>{
        history.back()
    }
</script>
</html>
