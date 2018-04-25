<?php

namespace io\clonalejandro\utils\players;

/**
 * Created by alejandrorioscalera
 * 25/04/2018
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

class Human implements IPlayer {


    /** SMALL CONSTRUCTORS **/

    private $cards, $points, $planted;

    /**
     * Human constructor.
     */
    public function __construct()
    {
        $this->cards = array();
    }


    /** REST **/

    /**
     * This function add card to player
     * @param object $card
     */
    public function addCard($card)
    {
        $this->addPoint($card->getValue()); //Add player points
        array_push($this->cards, $card); //Add a card to array cards
    }


    /**
     * This function returns a card list
     * @return array
     */
    public function getCards()
    {
        return $this->cards;
    }


    /**
     * This function returns a player points
     * @return int || @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }


    /**
     * This function set this player as planted
     * @param boolean $planted || @param bool $planted
     */
    public function setPlated($planted)
    {
        $this->planted = $planted;
    }


    /**
     * @return boolean || @return bool
     */
    public function isPlanted()
    {
        return $this->planted;
    }


    /** OTHERS **/

    /**
     * This function increase the player points
     * @param int $points
     */
    private function addPoint($points)
    {
        $this->points += $points;
    }


}