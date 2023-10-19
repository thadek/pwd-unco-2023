<?php


use Discord\Builders\Components\SelectMenu;
use Discord\Builders\Components\Option;
use Discord\Builders\Components\Button;
use Discord\Builders\Components\ActionRow;
use Discord\Builders\MessageBuilder;
use Discord\Parts\Interactions\Interaction;


class Menu extends Comando
{

    public function __construct($discord)
    {
        parent::__construct('menu', 'Devuelve pong',$discord);
    }


    //CLASE DE PRUEBA PARA VER SI FUNCIONA EL MENU
    public function ejecutar($message, $params)
    {
        return function ($message, $params) {
            $message->reply("Función en desarrollo");
          /*  $select = SelectMenu::new()
                ->addOption(Option::new('me?'))
                ->addOption(Option::new('or me?'));

            $button = Button::new(Button::STYLE_SUCCESS)
                ->setLabel('push me!')
                ->setCustomId("push_me");


            $actionRow = ActionRow::new()
                ->addComponent($button);

              
                $select->setListener(function (Interaction $interaction) {
                    $interaction->respondWithMessage(MessageBuilder::new()->setContent('You selected ' . $interaction->values[0]));
                

                   
                },$this->discord);
               
                


                
              

                $message->reply(MessageBuilder::new()
                ->setContent('Hello, world!')
                ->addComponent($select)
                ->addComponent($actionRow));*/
        };
    }
}
