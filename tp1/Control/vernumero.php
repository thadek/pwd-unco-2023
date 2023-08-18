<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver numero ingresado</title>
</head>
<body>

<?php 

if($_POST){
    comparar($_POST["f_num"]);
}else{
    echo "<p>No se ingreso ningún valor.</p>";
}


function comparar($num){
    if($num > 0){
        echo "El numero ingresado es positivo.";
    }elseif($num < 0){
        echo "El numero ingresado es negativo.";
    }else{
        echo "El numero ingresado es cero.";
    }
}

?>
    
</body>
</html>