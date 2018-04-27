<?php

namespace io\clonalejandro\utils\game;

require_once "IGame.php"; require_once "GameState.php"; require_once "utils/ConsoleUtil.php";
require_once "cards/ICard.php"; require_once "cards/Az.php"; require_once "cards/Two.php";
require_once "cards/Three.php"; require_once "cards/Four.php"; require_once "cards/Five.php";
require_once "cards/Six.php"; require_once "cards/Seven.php"; require_once "cards/Jack.php"; 
require_once "cards/Horse.php"; require_once "cards/King.php"; require_once "utils/players/IPlayer.php"; 
require_once "utils/players/Human.php"; require_once "utils/players/Bot.php"; require_once "GameProcess.php";

use IGame;
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

class GameManager extends GameProcess implements IGame {


    /** SMALL CONSTRUCTORS **/

    public $state, $human, $bot, $chances, $loser, $chancesCount = 40;

    /**
     * GameManager constructor.
     */
    public function __construct()
    {
        parent::__construct($this);

        //Define the main values
        $this->setState(GameState::WAITING);
        $this->initArr();
        $this->start();
    }


    /** REST **/

    /**
     * This function be executed when the game start
     */
    public function start()
    {
        do $this->onGameStart();
        while ($this->state != GameState::ENDING);
    }


    /**
     * This function stop the game
     */
    public function end()
    {
        $this->setState(GameState::ENDING);
        $this->human->setPlanted(true);
        $this->bot->setPlanted(true);

        exit("Has abandonado el juego");
    }


    /**
     * This function manage reset process
     */
    public function reset()
    {
        $key = null;

        do {
            $key = consoleInput(function (){
                echo "Jugador ". $this->getPlayerName($this->getWinner()) ." gana la partida.\n";
                echo "Pulsa Repetir (r) Abandonar (a): ";
            });
        } while ($key != "r" && $key != "a");

        consoleSpace(); //Break line

        if ($key == "r") $this->onGameReset();
        else if ($key == "a") $this->end();
    }


    /**
     * This function compare the results
     */
    public function compareResults()
    {
        $humanPoints = $this->human->getPoints();
        $botPoints = $this->bot->getPoints();

        if ($humanPoints > 7.5 && $botPoints <= 7.5)
            $this->loser = $this->human;
        else if ($humanPoints <= 7.5 && $botPoints > 7.5)
            $this->loser = $this->bot;
        else if ($humanPoints > 7.5 && $botPoints > 7.5 || $humanPoints == $botPoints)
            $this->loser = $this->human;
        else if ($botPoints > $humanPoints)
            $this->loser = $this->human;
        else if ($botPoints < $humanPoints)
            $this->loser = $this->bot;

        $this->reset();
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


    /**
     * This function returns a player Loser
     * @return IPlayer
     */
    public function getLoser()
    {
        return $this->loser;
    }


    /**
     * This function returns a player Winner
     * @return IPlayer || @return null
     */
    public function getWinner()
    {
        if ($this->getLoser() instanceof Human)
            return $this->bot;
        else if ($this->getLoser() instanceof Bot)
            return $this->human;
        return null;
    }


    /**
     * This function returns a Player name
     * @param IPlayer $player
     * @return string
     */
    public function getPlayerName($player)
    {
        if ($player instanceof Human) return "Humano";
        else if ($player instanceof Bot) return "Máquina";
        return null;
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
        while ((!$this->human->isPlanted() && !$this->bot->isPlanted()));
    }


    /**
     * This function manage onGameReset
     */
    private function onGameReset(){
        $this->start();
    }


    /**
     * This function init the array chances
     */
    private function initArr()
    {
        $this->chances = array(new Az("Copas"), new Two("Copas"), new Three("Copas"), new Four("Copas"),
            new Five("Copas"), new Six("Copas"), new Seven("Copas"), new Jack("Copas"),
            new Horse("Copas"), new King("Copas"), new Az("Espadas"), new Two("Espadas"),
            new Three("Espadas"), new Four("Espadas"), new Five("Espadas"), new Six("Espadas"),
            new Seven("Espadas"), new Jack("Espadas"), new Horse("Espadas"), new King("Espadas"),
            new Az("Bastos"), new Two("Bastos"), new Three("Bastos"), new Four("Bastos"),
            new Five("Bastos"), new Six("Bastos"), new Seven("Bastos"), new Jack("Bastos"),
            new Horse("Bastos"), new King("Bastos"), new Az("Oros"), new Two("Oros"),
            new Three("Oros"), new Four("Oros"), new Five("Oros"), new Six("Oros"),
            new Seven("Oros"), new Jack("Oros"), new Horse("Oros"), new King("Oros"));
    }


}