<?php
namespace CodeGen\Statement;

use CodeGen\Expr\FunctionCall;
use CodeGen\Renderable;
use CodeGen\VariableDeflator;

class ConstStatement extends Statement implements Renderable
{
    protected $symbol;

    protected $value;

    public function __construct($symbol, $value)
    {
        $this->symbol = $symbol;
        $this->value = $value;
    }

    public function render(array $args = array())
    {
        $out = 'CONST ' . $this->symbol .  ' = ';
        if ($this->value instanceof Renderable) {
            $out .= $this->value->render($args);
        } else {
            $out .= VariableDeflator::deflate($this->value, true);
        }
        return $out . ';';
    }

}





