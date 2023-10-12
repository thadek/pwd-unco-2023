<?php

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;
use Discord\Builders\MessageBuilder;


class Qr extends Comando
{

    public function __construct()
    {
        parent::__construct('qr', 'Genera un codigo qr a partir del texto recibido',null);
    }


    /**
     * Genera un codigo qr a partir del contenido recibido y lo devuelve como string
     * @param string $contenido
     * @return string
     */
    private function generarQR($contenido)
    {
        $writer = new PngWriter();
        $qrCode = QrCode::create($contenido)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $logo = Logo::create(__DIR__ . '/img/logo.png')
            ->setResizeToWidth(50)
            ->setPunchoutBackground(true);

        $result = $writer->write($qrCode, $logo);
        return $result->getString();
    }




    public function ejecutar($message, $params)
    {
        return function ($message, $params) {
            //Obtengo el contenido del mensaje quitando el comando
            $contenido = explode(' ', $message->content)[2];
            $respuesta = '';
            if (strlen($contenido) > 100) {
                $respuesta = 'El texto es demasiado largo';
            } else if (strlen($contenido) < 1) {
                $respuesta = 'No se recibio texto';
            } else {
                $message->reply('Generando codigo QR...');
                try {
                    $codigoQR = $this->generarQR($contenido);
                    $respuesta = MessageBuilder::new()->addFileFromContent("qr.png", $codigoQR);
                } catch (Exception $e) {
                    $respuesta = 'Error al generar el codigo QR';
                    echo $e;
                }
            }
            $message->reply($respuesta);
            return;
        };
    }
}
