<?php

use Discord\Discord;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;
use Discord\Parts\Channel\Message;

require_once("env.php");

include __DIR__.'/vendor/autoload.php';

$token = getenv('DISCORD_TOKEN');
$prefix = getenv('DISCORD_PREFIX');


$discord = new Discord([
    'token' => $token,
    'intents' => Intents::getDefaultIntents(),
    ]);

$discord->on('ready', function ($discord) {
    echo "Bot is ready.", PHP_EOL;
});

$discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {

 if($message->content == 'ping'){
     $message->reply('pong!')->done(function ($message) {
        echo "Sent message: {$message->content}", PHP_EOL;
       });
 }
    
});



$discord->run();
