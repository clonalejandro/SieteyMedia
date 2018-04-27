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

class Five implements ICard {


    /** SMALL CONSTRUCTORS **/

    private $value, $stick;

    /**
     * Five constructor.
     * @param string $stick
     */
    public function __construct($stick)
    {
        $this->setValue(5);
        $this->stick = $stick;
    }


    /** REST **/

    /**
     * This function return a value for Card As
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }


    /**
     * This function return a card type
     * @return string
     */
    public function getStick()
    {
        return $this->stick;
    }


    /** OTHERS **/

    /**
     * This function set a Card value
     * @param integer $value || @param int $value
     */
    function setValue($value)
    {
        $this->value = $value;
    }


    /**
     * This function set a card type, example: Copas
     * @param string $stick
     */
    function setStick($stick)
    {
        $this->stick = $stick;
    }


}