<?php


include __DIR__.'/vendor/autoload.php';
include_once(__DIR__.'/control/IComando.php');
include_once(__DIR__.'/control/Comando.php');


//Variables de entorno
require_once("env.php");
$token = getenv('DISCORD_TOKEN');

use Discord\DiscordCommandClient;
use Discord\Parts\Channel\Message;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;

use function React\Async\coroutine;

// Creo el cliente de discord
$discord = new DiscordCommandClient([
    'token' => $token, 
]);

// Create a $browser with same loop as $discord
$browser = new Browser(null, $discord->getLoop());

//Comando ejemplo
$discord->registerCommand('discordstatus', function (Message $message, $params) use ($browser) {
    coroutine(function (Message $message, $params) use ($browser) {
        // Ignore messages from any Bots
        if ($message->author->bot) return;

        try {
            // Make GET request to API of discordstatus.com
            $response = yield $browser->get('https://discordstatus.com/api/v2/status.json');

            assert($response instanceof ResponseInterface); // Check if request succeed

            // Get response body
            $result = (string) $response->getBody();

            // Uncomment to debug result
            //var_dump($result);

            // Parse JSON
            $discordstatus = json_decode($result);

            // Send reply about the discord status
            $message->reply('Discord status: ' . $discordstatus->status->description);
        } catch (Exception $e) { // Request failed
            // Uncomment to debug exceptions
            //var_dump($e);

            // Send reply about the discord status
            $message->reply('Unable to acesss the Discord status API :(');
        }
    }, $message, $params);
});


//Gestor de comandos por carpeta
$comandos = scandir(__DIR__.'/control/comandos');

foreach($comandos as $comando){
    if (pathinfo($comando, PATHINFO_EXTENSION) === 'php') {
        $nombre = explode('.', $comando)[0];
        echo "Registrando comando $nombre\n";

        if(file_exists(__DIR__.'/control/comandos/'.$nombre.'.php')){
            //Si es la clase padre, no la registro
           
            include __DIR__.'/control/comandos/'.$nombre.'.php';
            //Sino instancio la clase y registro el comando
            $clase = new $nombre();
            $discord->registerCommand($clase->getNombre(), $clase->ejecutar($message, $params));
        }
        
    }
}


// Iniciar el bot
$discord->run();