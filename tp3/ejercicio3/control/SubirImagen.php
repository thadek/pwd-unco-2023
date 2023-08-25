<?php
class SubirImagen {
    private $directorioDestino;

    public function __construct() {
        // Directorio donde se almacenarán las imágenes
        $this->directorioDestino = __DIR__ . '/archivos_imagen/'; // Ruta absoluta al directorio
    }

    public function subir($archivo) {
        $nombreArchivo = $archivo['name'];

        // Verifica si es una imagen (puedes agregar más validaciones aquí)
        $tipoImagen = exif_imagetype($archivo['tmp_name']);
        if ($tipoImagen !== false) {
            // Genera un nombre único para la imagen
            $nombreUnico = uniqid() . '_' . $nombreArchivo;
            $rutaDestino = $this->directorioDestino . $nombreUnico;

            // Mueve la imagen al directorio de destino
            if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                return $nombreUnico; // Éxito: Devuelve el nombre único de la imagen
            } else {
                return false; // Error al subir la imagen
            }
        } else {
            return false; // No es una imagen válida
        }
    }
}
?>
