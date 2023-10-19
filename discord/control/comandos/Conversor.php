<?php

include_once('../control/Conversion.php');

use UnitConverter\UnitConverter;

class Conversor extends Comando {
    

    public function __construct()
    {
        parent::__construct('convertir', 'Convierte el tipo de unidad de un valor a otra unidad',null,["usage"=>"convertir valor unidad_entrada unidad_salida"]);
    }



    public function cambioUnidad($valorEntrada, $unidadEntrada, $unidadSalida){
        $valorFinal = 0;
        $converter = UnitConverter::default();
        $objConversion = new Conversion($valorEntrada, $unidadEntrada, $unidadSalida);
        try {
            $verificar = $objConversion->verificarUnidades($unidadEntrada, $unidadSalida);
            if ($verificar) {
                $valorFinal = $converter->convert($valorEntrada)->from($unidadEntrada)->to($unidadSalida);
            }
        } catch (Exception $e) {
            // Manejo de la excepción
            echo $e->getMessage(); // Puedes imprimir o registrar el mensaje de error
            // También puedes lanzar la excepción nuevamente si es necesario:
            throw $e;
        }
        return $valorFinal;
    }

    public function ejecutar($message, $params)
    {
        return function ($message, $params) {
            $respuesta = '';
            $contenido = $message->content;

            $palabras = explode(' ', $contenido);

            if(count($palabras) > 5){
                $respuesta = 'El comando debe contener menos de 6 palabras';
            }else if(count($palabras) < 1){
                $respuesta = 'No se recibio texto';
            }else{
                $message->reply('Generando Conversion...');
                if(count($palabras) >= 4){
                    $valorEntrada = $palabras[1];
                    $unidadEntrada = $palabras[2];
                    $unidadSalida = $palabras[3];
                    $resultado = $this->cambioUnidad($valorEntrada, $unidadEntrada, $unidadSalida);
                    $respuesta = $resultado . '' .  $unidadSalida;
                }else{
                    $respuesta = 'Error al realizar conversión';
                }
                /*try{
                    $resultado = $this->cambioUnidad($valorEntrada, $unidadEntrada, $unidadSalida);
                    $respuesta = $resultado + $unidadSalida;
                } catch (Exception $e) {
                    $respuesta = 'Error al realizar conversión';
                    echo $e;
                }*/
            }
            $message->reply($respuesta);
            return;
        };
    }
}