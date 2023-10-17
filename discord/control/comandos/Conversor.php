<?php

include_once('Conversion.php');

use UnitConverter\UnitConverter;

class Conversor extends Comando {
    

    public function __construct()
    {
        parent::__construct('convertir', 'Convierte el tipo de unidad de un valor a otra unidad',null);
    }



    public function cambioUnidad($valorEntrada, $unidadEntrada, $unidadSalida){
        $valorFinal = 0;
        $converter = UnitConverter::default();
        $objConversion = new Conversion($valorEntrada, $unidadEntrada, $unidadSalida);
        $verificar = $objConversion->verificarUnidades($unidadEntrada, $unidadSalida);
        if($verificar){
            $valorFinal = $converter->convert($valorEntrada)->from($unidadEntrada)->to($unidadSalida);
        }
        return $valorFinal;
    }

    public function ejecutar($message, $params)
    {
        return function ($message, $params) {
            $respuesta = '';
            $contenido = $message->content;

            $palabras = explode(' ', $contenido);

            if(count($palabras) > 6){
                $respuesta = 'El comando debe contener menos de 6 palabras';
            }else if(count($palabras) < 1){
                $respuesta = 'No se recibio texto';
            }else{
                $message->reply('Generando Conversion...');
                if(count($palabras) >=5){
                    $valorEntrada = $palabras[2];
                    $unidadEntrada = $palabras[3];
                    $unidadSalida = $palabras[4];
                }
                try{
                    $resultado = $this->cambioUnidad($valorEntrada, $unidadEntrada, $unidadSalida);
                    $respuesta = $resultado + $unidadSalida;
                } catch (Exception $e) {
                    $respuesta = 'Error al realizar conversión';
                    echo $e;
                }
            }
            $message->reply($respuesta);
            return;
        };
    }
}