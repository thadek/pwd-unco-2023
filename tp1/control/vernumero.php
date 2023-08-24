<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver numero ingresado</title>
    <link rel="stylesheet" href="..\vista\css\estilos.css">
</head>
<body>

<div id="navbar"></div>




<?php 

if($_POST){
    $resultado = comparar($_POST["f_num"]);
    echo <<<CONTENIDO
    <div class="contenedor columna">
    <p class="texto_simple"> {$resultado} </p>
    <button class="boton" onclick="volver()">Volver</button>
    </div>
    CONTENIDO;
}else{
    echo <<<CONTENIDO
    <div class="contenedor columna">
    <p class="texto_simple"> No se ingreso ningún numero. </p>
    <button class="boton" onclick="volver()">Volver</button>
    </div>
    CONTENIDO;
}


function comparar($num){
    $retorno = "";
    if($num > 0){
        $retorno = "El numero ingresado es positivo.";
    }elseif($num < 0){
        $retorno = "El numero ingresado es negativo.";
    }else{
        $retorno = "El numero ingresado es cero.";
    }
    return $retorno;
}


?>
    
</body>
<script src="/tp1/vista/js/navegacion.js"></script>
<script type="text/javascript">
    const volver = () =>{
        window.location.href = "/tp1/vista/ejercicio1.html";
    }
</script>
</html>