<?php

namespace io\clonalejandro\utils\game;

include "GameState.php";
include "utils/ConsoleUtil.php";
include "IGame.php";

use IGame;

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

class GameManager implements IGame  {


    /** SMALL CONSTRUCTORS **/

    private $state;

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
        while ($this->state != GameState::ENDING){
            //This be executed while state not equals ending

            //TODO: onGameStart

            /*
            $input = consoleInput(function (){
                echo "Write your name: ";
            });

            echo "Your name is: $input";
            sleep(1);
            consoleClear();
            */
        }
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


}
