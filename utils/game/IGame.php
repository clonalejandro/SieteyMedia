<?php

use io\clonalejandro\utils\players\IPlayer;

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

interface IGame
{


    /**
     * This function start the game
     */
    public function start();


    /**
     * This function stop the game
     */
    public function end();


    /**
     * This function reset the game
     */
    public function reset();


    /**
     * This function set the game state
     * @param string $state
     */
    public function setState($state);


    /**
     * This function returns a game state
     * @return string
     */
    public function getState();


    /**
     * This function set a Player as loser
     * @param IPlayer $loser
     */
    public function setLoser($loser);


    /**
     * This function returns a player Loser
     * @return IPlayer
     */
    public function getLoser();


    /**
     * This function returns a player Winner
     * @return IPlayer || @return null
     */
    public function getWinner();


    /**
     * This function returns a Player name
     * @param IPlayer $player
     * @return string
     */
    public function getPlayerName($player);


}