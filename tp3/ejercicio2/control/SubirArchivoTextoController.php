<?php
class SubirArchivoTextoController {
    private $directorioDestino;

    public function __construct() {
        // Directorio donde se almacenarán los archivos de texto
        $this->directorioDestino = __DIR__ . '/archivos_texto/'; // Ruta absoluta al directorio
    }

    public function procesarArchivo($archivo) {
        $nombreArchivo = $archivo['name'];

        // Verificamos el tipo del archivo (debe ser .doc o .pdf)
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        if (strtolower($extension) === 'txt') {
            // Movemos el archivo al directorio de destino
            $rutaDestino = $this->directorioDestino . $nombreArchivo;

            if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                return $nombreArchivo; // Éxito: Devuelve el nombre del archivo
            } else {
                return false; // Error al subir el archivo
            }
        } else {
            return false; // Tipo de archivo no válido
        }
    }
}
?>
