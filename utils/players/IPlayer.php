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

interface IPlayer {


    /**
     * This function add card to player
     * @param object $card
     */
    public function addCard($card);


    /**
     * This function returns a card list
     * @return array
     */
    public function getCards();


    /**
     * This function returns a player points
     * @return int || @return integer
     */
    public function getPoints();


    /**
     * This function set this player as planted
     * @param boolean $planted || @param bool $planted
     */
    public function setPlated($planted);


    /**
     * @return boolean || @return bool
     */
    public function isPlanted();


}