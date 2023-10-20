<?php

interface IComando {

    /**
     * Funcion que se llama cuando se ejecuta el comando.
     */
    public function ejecutar($message, $params);

}