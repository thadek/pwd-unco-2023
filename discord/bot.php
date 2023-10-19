<?php


include __DIR__.'/vendor/autoload.php';
include_once(__DIR__.'/control/IComando.php');
include_once(__DIR__.'/control/Comando.php');
include_once(__DIR__.'/control/Conversion.php');



//Variables de entorno
require_once("env.php");
$token = getenv('DISCORD_TOKEN');
$prefix = getenv("DISCORD_PREFIX");

use Discord\DiscordCommandClient;
use Discord\Parts\Channel\Message;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Discord\Discord;
use Discord\Parts\Interactions\Interaction;
use Discord\WebSockets\Event;
use Discord\Builders\MessageBuilder;

use function React\Async\coroutine;

// Creo el cliente de discord
$discord = new DiscordCommandClient([
    'token' => $token,
    'description'=>"Bot de discord creado a modo ejemplo para la actividad investigación librerias utiles PWD 2023 - Grupo 8",
    'prefix' => $prefix
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
},["description"=>"Consulta el estado de los servicios de discord a discordstatusAPI y devuelve el resultado"]);


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
            $clase = new $nombre($discord);
            $discord->registerCommand($clase->getNombre(), $clase->ejecutar($message, $params),["description" => $clase->getDescripcion(),...$clase->getOpciones()]);
        }
        
    }
}


$discord->on(Event::INTERACTION_CREATE, function (Interaction $interaction, Discord $discord) {

 

    if($interaction->data->custom_id == 'push_me'){
        $interaction->updateMessage(MessageBuilder::new()->setContent('You pushed me!'));
    }
});


// Iniciar el bot
$discord->run();