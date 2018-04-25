<?php

namespace io\clonalejandro\utils\game;

require_once "IGame.php"; require_once "GameState.php"; require_once "utils/ConsoleUtil.php";
require_once "cards/ICard.php"; require_once "cards/Az.php"; require_once "cards/Two.php";
require_once "cards/Three.php"; require_once "cards/Four.php"; require_once "cards/Five.php";
require_once "cards/Six.php"; require_once "cards/Seven.php"; require_once "cards/Jack.php"; 
require_once "cards/Horse.php"; require_once "cards/King.php"; require_once "utils/players/IPlayer.php"; 
require_once "utils/players/Human.php"; require_once "utils/players/Bot.php";

use IGame; use io\clonalejandro\cards\ICard;
use io\clonalejandro\cards\Az; use io\clonalejandro\cards\Two; 
use io\clonalejandro\cards\Three; use io\clonalejandro\cards\Four; 
use io\clonalejandro\cards\Five; use io\clonalejandro\cards\Six; 
use io\clonalejandro\cards\Seven; use io\clonalejandro\cards\Jack; 
use io\clonalejandro\cards\Horse; use io\clonalejandro\cards\King;
use io\clonalejandro\utils\players\IPlayer; use io\clonalejandro\utils\players\Human;
use io\clonalejandro\utils\players\Bot;

/**
 * Created by alejandrorioscalera
 * 24/04/2018
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

class GameManager implements IGame {


    /** SMALL CONSTRUCTORS **/

    private $state, $planted = false, $human, $bot;

    /**
     * GameManager constructor.
     */
    public function __construct()
    {
        $this->setState(GameState::WAITING);
        $this->start();
    }


    /** REST **/

    /**
     * This function be executed when the game start
     */
    public function start()
    {
        while ($this->state != GameState::ENDING)
            $this->onGameStart();
    }


    /**
     * This function stop the game
     */
    public function end()
    {
        //TODO: onGameEnd
        $this->setState(GameState::ENDING);
    }


    /**
     * This function set the game state
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }


    /**
     * This function returns a game state
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }


    /** OTHERS **/

    /**
     * This function manage onGameStart
     */
    private function onGameStart()
    {
        $this->human = new Human();
        $this->bot = new Bot();

        echo "Bienvenido al juego de las Siete y Media\n\n";

        do $this->gameProcess();
        while (!$this->planted);
    }
    
    
    /**
     * This function manage the process
     */
    private function gameProcess()
    {
        sleep(1);
        $card = $this->generateCard($this->human);
        $cardName = str_replace("io\clonalejandro\cards\\", "", get_class($card));

        echo "Has sacado el $cardName. Llevas ". $this->human->getPoints() ." puntos.\n";

        $key = null;

        do {
            $key = consoleInput(function (){
                echo "Pulse Plantarse (p) o Continuar (c): ";
            });
        } while ($key != "c" && $key != "p"); //Check if the key pulsed is p or c


        if ($key == "c") $this->gameProcess(); //Check if key is 'c' return to this function
        else if ($key == "p") echo "Hola Anna\n"; //TODO: next tournament
    }
    
    
    /**
     * This function return a chances
     * @return array
     */
    private function getChances()
    {
        return array(new Az(), new Two(),
                     new Three(), new Four(),
                     new Five(), new Six,
                     new Seven(), new Jack(),
                     new Horse(), new King());
    }


    /**
     * This function returns a new random Card
     * @param IPlayer $player
     * @return ICard
     */
    private function generateCard($player)
    {
        $card = $this->getChances()[rand(0, 9)];
        $player->addCard($card);
        return $card;
    }


}
