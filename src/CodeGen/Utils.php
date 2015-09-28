<?php
namespace CodeGen;
use Twig_Loader_Array;
use Twig_Environment;
use Closure;



class Utils
{
    static $stringloader = null;

    static $twig;

    static public function renderStringTemplate($templateContent, array $args = array(), Twig_Environment $env = null)
    {
        if (!$env) {
            if (self::$twig) {
                $env = self::$twig;
            } else {
                $env = new Twig_Environment(new Twig_Loader_Array([]));
            }
        }
        $template = $env->createTemplate($templateContent);

        if (is_callable($args)) {
            $args = call_user_func($args);
        } elseif ($args instanceof Closure) {
            $args = $args();
        }
        return $template->render($args);
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




