<?php

namespace io\clonalejandro\utils\game;

use io\clonalejandro\cards\ICard;
use io\clonalejandro\utils\ConsoleUtil;
use io\clonalejandro\utils\players\Bot;
use io\clonalejandro\utils\players\Human;
use io\clonalejandro\utils\players\IPlayer;

/**
 * Created by alejandrorioscalera
 * 27/04/2018
 *
 * -- SOCIAL NETWORKS --
 *
 * GitHub: https://github.com/clonalejandro or @clonalejandro
 * Website: https://clonalejandro.me/
 * Twitter: https://twitter.com/clonalejandro11/ or @clonalejandro11
 * Keybase: https://keybase.io/clonalejandro/
 *
 * -- LICENSE --
 *
 * All rights reserved for clonalejandro ©47471763Q 2017 / 2018
 */

class GameProcess {


    /** SMALL CONSTRUCTORS **/

    private $manager;

    /**
     * GameProcess constructor.
     * @param GameManager $manager
     */
    public function __construct(GameManager $manager)
    {
        $this->manager = $manager;
    }


    /** REST **/

    /**
     * This function manage the process
     */
    protected function gameProcess()
    {
        if ($this->manager->chancesCount != 0) $this->playerProcess();
        else $this->end();
    }


    /**
     * This function manage the player process
     */
    protected function playerProcess()
    {
        $this->generateCard($this->manager->human);

        $key = null;

        do {
            $key = ConsoleUtil::consoleInput(function (){
                echo "Pulse Plantarse (p) o Continuar (c): ";
            });
        } while ($key != "c" && $key != "p");

        ConsoleUtil::consoleSpace(); //Break line

        if ($key == "c") $this->gameProcess();
        else if ($key == "p") $this->botProcess();
    }


    /**
     * This function manage the bot process
     */
    protected function botProcess()
    {
        $this->manager->human->setPlanted(true);
        echo "El jugador Humano se ha plantado.\n\n";

        //Loop this 3 times
        for ($i = 0; $i <= 3; $i++)
            if ($this->manager->bot->getPoints() <= 4)
                $this->generateCard($this->manager->bot);
            else {
                $this->manager->bot->setPlanted(true);
                echo "El jugador Máquina se ha plantado.\n\n";
                $this->manager->compareResults();
            }
    }


    /** OTHERS **/

    /**
     * This function return a chances
     * @return array
     */
    private function getChances()
    {
        return $this->manager->chances;
    }


    /**
     * This function returns a new random Card
     * @param IPlayer $player
     * @return ICard
     */
    private function generateCard($player)
    {
        if ($player->getPoints() > 7.5){
            $this->manager->setLoser($player);
            $this->reset();
        }
        else {
            $card = $this->getChances()[
                rand(0, $this->manager->chancesCount -= 1)
            ];

            if ($card == null){
                echo $this->manager->chancesCount;
                var_dump($this->getChances());
            }

            $player->addCard($card);
            $this->removeCardFromList($card);
            $this->onCardGenerate($player, $this->getCardName($card));

            return $card;
        }
        return null;
    }


    /**
     * This function get a card name
     * @param ICard $card
     * @return string
     */
    private function getCardName($card)
    {
        $cardName = str_replace("io\clonalejandro\cards\\", "", get_class($card));

        switch ($cardName){
            default: break;
            case "Az":
                $cardName = "As";
                break;
            case "Two":
                $cardName = "Dos";
                break;
            case "Three":
                $cardName = "Tres";
                break;
            case "Four":
                $cardName = "Cuatro";
                break;
            case "Five":
                $cardName = "Cinco";
                break;
            case "Six":
                $cardName = "Seis";
                break;
            case "Seven":
                $cardName = "Siete";
                break;
            case "Jack":
                $cardName = "Sota";
                break;
            case "Horse":
                $cardName = "Caballo";
                break;
            case "King":
                $cardName = "Rey";
                break;
        }

        return $cardName . " de " . $card->getStick();
    }


    /**
     * This function removes a card from cards list
     * @param ICard $card
     */
    private function removeCardFromList($card)
    {
        foreach (array_keys($this->manager->chances, $card) as $key)
            array_splice($this->manager->chances, $key, 1);
    }


    /**
     * This function manage onCardGenerate
     * @param IPlayer $player
     * @param string $cardName
     */
    private function onCardGenerate($player, $cardName)
    {
        if ($player instanceof Human){
            echo "El jugador Humano pide carta.\n";
            echo "Has sacado el $cardName. Llevas ". $this->manager->human->getPoints() ." puntos.\n";
        }
        else if ($player instanceof Bot){
            echo "El jugador Máquina pide carta.\n";
            echo "Ha sacado el $cardName. Lleva ". $this->manager->bot->getPoints() ." puntos.\n\n";
        }
     }


}