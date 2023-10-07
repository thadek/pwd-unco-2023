
# G8 Discord Bot

Bot de discord realizado para la investigación de clases/librerías útiles en PWD 2023.
El mismo cuenta con una serie de comandos estándar definidos para este ejemplo.

Para una guía mas detallada visitar este [link.](http://localhost/)


### Requisitos
- Composer, para gestión de dependencias
- PHP 8.1 o superior
- PHP CLI (El bot no se ejecuta en un webserver, sólo por consola.)


### Dependencias
- DiscordPHP
- endroid/qr-code
- react/async
- imagine

## ¿Cómo empezar?


1. Posicionarse en la carpeta del bot 

    ```
    cd pwd-unco-2023/clases-utiles/discord
    ```

2. Instalar dependencias usando composer
    ```
    composer install
    ```
3. Crear dentro de la carpeta discord un archivo env.php (Variable de entorno) que va a guardar el token del bot para interactuar con la API de discord.
El contenido es el siguiente:

    ```
    <?php 
    putenv("DISCORD_TOKEN=nuestro-token");
    ?>
    ```

4) Ejecutar el archivo bot.php que esta en la carpeta del bot

    ```
    php bot.php
    ```


## Uso básico y comandos
Para interactuar con el bot en discord, es necesario incluirlo en el servidor generando un link de invitación. Más info en nuestra guía detallada.

Una vez realizado lo anterior, para interactuar se utiliza la sintaxis 
`@NombreDelBot comando`

### Comandos básicos

| Comando  | Descripción | Ejemplo de uso|
| ------------- | ------------- | ------------- |
| `ping` | Test de ping  | `@G8Bot ping` |
| `discordstatus`  | Consume la API de DiscordStatus para indicarte el estado  | `@G8Bot discordstatus`|
| `hola`  | Saluda al usuario tageandolo  | `@G8Bot hola`|
| `qr`  | Genera un código QR con el texto que envies después de la palabra `qr`  | `@G8Bot qr https://google.com`|