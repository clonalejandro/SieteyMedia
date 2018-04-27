<?php

namespace io\clonalejandro\cards;

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

interface ICard {


    /**
     * This function set a Card value
     * @param integer $value || @param int $value
     */
    function setValue($value);


    /**
     * This function set a card type, example: Copas
     * @param string $stick
     */
    function setStick($stick);


    /**
     * This function return a value for Card
     * @return int
     */
    public function getValue();



    /**
     * This function return a card type
     * @return string
     */
    public function getStick();


}