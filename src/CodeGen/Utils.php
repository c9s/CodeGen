<?php
namespace CodeGen;
use Twig_Loader_String;
use Twig_Environment;
use Closure;

class Utils
{
    static public function renderStringTemplate($templateContent, $args = array()) {
        $loader = new Twig_Loader_String();
        $twig = new Twig_Environment($loader);

        if ( is_callable($args) ) {
            $args = call_user_func($args);
        } elseif ( $args instanceof Closure ) {
            $args = $args();
        }
        return $twig->render($templateContent, $args);
    }

    static public function indent($indent = 1, $spaces = 4)
    {
        return str_repeat(' ', $spaces * $indent );
    }
}




