<?php 

class Numero {

    private $numero;

    public function __construct($numero){
        $this->numero = $numero;
    }

    //Getters y Setters
    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function comparar(){
        $retorno = "";
        if($this->numero > 0){
            $retorno = "El numero ingresado es positivo.";
        }elseif($this->numero < 0){
            $retorno = "El numero ingresado es negativo.";
        }else{
            $retorno = "El numero ingresado es cero.";
        }
        return $retorno;
    }

    public static function operarNumeros($operacion,$num1,$num2){
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


}