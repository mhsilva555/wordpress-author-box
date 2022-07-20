<?php

namespace WppAuthorBox;

class Helpers
{
    /**
     * Returns data formatted with the function print_r()
     * @param $debug
     */
    public static function debug($debug)
    {
        echo '<pre>', print_r($debug), '</pre>';
    }
}