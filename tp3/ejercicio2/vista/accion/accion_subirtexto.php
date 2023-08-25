<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['archivo'])) {
        require_once '../../control/SubirArchivoTextoController.php'; // Incluye la clase del controlador

        $subirArchivoTexto = new SubirArchivoTextoController();
        $nombreArchivoSubido = $subirArchivoTexto->procesarArchivo($_FILES['archivo']);

        if ($nombreArchivoSubido) {
            header("Location: ../resultados_texto.php?archivo=$nombreArchivoSubido");
            exit;
        } else {
            header("Location: ../resultados_texto.php?error=Ocurrió un error al subir el archivo.");
            exit;
        }
    } else {
        header("Location: ../resultados_texto.php?error=No se ha seleccionado ningún archivo.");
        exit;
    }
}
?>
