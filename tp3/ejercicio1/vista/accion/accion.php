<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['archivo'])) {
        require_once '../../control/SubirArchivoController.php'; // Incluye la clase del controlador

        $subirArchivo = new SubirArchivoController();
        $nombreArchivoSubido = $subirArchivo->procesarArchivo($_FILES['archivo']);

        if ($nombreArchivoSubido) {
            header("Location: ../mostrar_resultado.php?archivo=$nombreArchivoSubido");
            exit;
        } else {
            header("Location: ../mostrar_resultado.php?error=Ocurrió un error al subir el archivo.");
            exit;
        }
    } else {
        header("Location: ../mostrar_resultado.php?error=No se ha seleccionado ningún archivo.");
        exit;
    }
}
?>
