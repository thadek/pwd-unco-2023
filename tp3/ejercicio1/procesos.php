<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Comprobamos si se ha subido un archivo
    if (isset($_FILES['archivo'])) {
        $archivo = $_FILES['archivo'];

        // Verificamos la extensión del archivo
        $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        $tiposValidos = array('doc', 'pdf');

        if (in_array(strtolower($extension), $tiposValidos)) {
            // Verificamos el tamaño del archivo (2MB máximo)
            if ($archivo['size'] <= 2 * 1024 * 1024) {
                // Carpeta donde se almacenarán los archivos cargados
                $carpetaDestino = './archivos/';

                // Movemos el archivo al destino final
                $nombreArchivo = uniqid() . '_' . $archivo['name'];
                $rutaDestino = $carpetaDestino . $nombreArchivo;

                if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                    echo "El archivo se ha subido correctamente. <a href='$rutaDestino'>Descargar</a>";
                } else {
                    echo "Ha ocurrido un error al subir el archivo.";
                }
            } else {
                echo "El archivo es demasiado grande. El tamaño máximo permitido es 2MB.";
            }
        } else {
            echo "Tipo de archivo no válido. Solo se permiten archivos .doc y .pdf.";
        }
    } else {
        echo "No se ha seleccionado ningún archivo.";
    }
}
?>
