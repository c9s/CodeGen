<?php
namespace CodeGen;
use CodeGen\Raw;
use CodeGen\Exportable;

class VariableDeflator
{
    static public function deflate($arg) 
    {
        // Raw string output
        if (is_string($arg) && $arg[0] == '$') {
            return $arg;
        } else if ($arg instanceof Renderable) {
            return $arg->render(array());
        } else if ($arg instanceof Raw) {
            return $arg->__toString();
        } else if ($arg instanceof Exportable || method_exists($arg, "__get_state")) {
            $class = get_class($arg);
            return $class . '::__set_state(' . var_export($arg->__get_state(), true) . ')';
        } else if (is_array($arg) || method_exists($arg,"__set_state") || is_scalar($arg)) {
            return var_export($arg, true);
        } else {
            throw new LogicException("Can't deflate variable");
        }
    }
}




