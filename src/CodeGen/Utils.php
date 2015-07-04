<?php
namespace CodeGen;
use Twig_Loader_String;
use Twig_Environment;
use Closure;

class Utils
{
    static $stringloader = null;
    static $twig;

    static public function renderStringTemplate($templateContent, array $args = array()) 
    {
        if (!self::$stringloader) {
            self::$stringloader = new Twig_Loader_String();
        }
        if (!self::$twig) {
            self::$twig = new Twig_Environment(self::$stringloader);
        }
        if (is_callable($args)) {
            $args = call_user_func($args);
        } elseif ($args instanceof Closure) {
            $args = $args();
        }
        return self::$twig->render($templateContent, $args);
    }

    static public function evalCallback($cb) 
    {
        return is_callable($cb) ? $cb() : $cb;
    }

    static public function indent($indent = 1, $spaces = 4)
    {
        return str_repeat(' ', $spaces * $indent);
    }
}




