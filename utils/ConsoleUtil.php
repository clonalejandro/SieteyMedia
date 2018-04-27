<?php
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


/**
 * This function manage the console data input
 * @param $beforeInput
 * @return mixed
 */
function consoleInput($beforeInput)
{
    $beforeInput();
    return trim(fgets(STDIN));
}


/**
 * This function clear the console
 */
function consoleClear()
{
    for ($i = 0; $i <= 50; $i++) echo "\n";
}


/**
 * This function break line
 */
function consoleSpace()
{
    echo "\n";
}

