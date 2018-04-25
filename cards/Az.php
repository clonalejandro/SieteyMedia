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

class Az implements ICard {


    /** SMALL CONSTRUCTORS **/

    private $value;

    public function __construct()
    {
        $this->setValue(1);
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


    /** OTHERS **/

    /**
     * This function set a Card value
     * @param integer $value || @param int $value
     */
    function setValue($value)
    {
        $this->value = $value;
    }


}