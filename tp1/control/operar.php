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
if(!empty($_POST["op1"]) && !empty($_POST["op2"]) && !empty($_POST["operacion"])){

    $resultado = operar($_POST["operacion"],$_POST["op1"],$_POST["op2"]);

    echo <<<CONTENIDO
    <div class="contenedor columna">
    <p class="textosimple">Numero 1: {$_POST["op1"]} <br> Numero 2: {$_POST["op2"]} <br> Operación: {$_POST["operacion"]} <br> Resultado es: {$resultado} </p>
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

function operar($operacion,$num1,$num2){
    $resultado = 0;
    switch($operacion){
        case "suma":
            $resultado = $num1 + $num2;
            break;
        case "resta":
            $resultado = $num1 - $num2;
            break;
        case "multiplicacion":
            $resultado = $num1 * $num2;
            break;
        case "division":
            if($num2 != 0){
                $resultado = $num1 / $num2;
            }else{
                $resultado = "No se puede dividir por cero";
            }         
            break;
        default:
            $resultado = "No se ingreso una operacion valida";
            break;
    }
    return $resultado;
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
