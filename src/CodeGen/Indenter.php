<?php
namespace CodeGen;

class Indenter
{
    static public $expandTab = true;

    static public $spaceWidth = 4;

    static public function indent($level = 1)
    {
        if (self::$expandTab) {
            $tab = str_repeat(' ', self::$spaceWidth); 
            return str_repeat($tab, $level);
        } else {
            return str_repeat("\t", $level);
        }

    }
}




