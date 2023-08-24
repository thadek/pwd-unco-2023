<?php

    if($_POST){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        
        $resultado = mostrarResultado($num1, $num2);
        echo "El resultado de la operacion es: " . $resultado;
    }

    function mostrarResultado($num1, $num2){
        $resultado = 0;
        if(isset($_POST["operaciones"])){
            $operacionSeleccionada = $_POST["operaciones"];
            if($operacionSeleccionada == "suma"){
                $resultado = sumar($num1, $num2);
            }elseif($operacionSeleccionada == 'resta'){
                $resultado = restar($num1, $num2);
            }else{
                $resultado = multiplicar($num1, $num2);
            }
        } 
        return $resultado;
    }

    function sumar($num1, $num2){
        $suma = 0;

        $suma = $num1 + $num2;

        return $suma;
    } 

    function restar($num1, $num2){
        $resta = 0;

        $resta = $num1 - $num2;

        return $resta;
    }

    function multiplicar($num1, $num2){
        $resultado = 0;

        $resultado = $num1 * $num2;

        return $resultado;
    }