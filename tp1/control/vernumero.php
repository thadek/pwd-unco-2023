<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver numero ingresado</title>
    <link rel="stylesheet" href="..\Vista\css\estilos.css">
</head>
<body>

<?php 

if($_POST){
    echo comparar($_POST["f_num"]);
}else{
    echo "<p>No se ingreso ningún valor.</p>";
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
</html>