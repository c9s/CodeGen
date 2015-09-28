<?php
namespace CodeGen\Statement;
use CodeGen\Renderable;
use CodeGen\Line;
use CodeGen\Expr\FunctionCall;

class DefineStatement extends Statement implements Renderable
{
    public function __construct($symbol, $value)
    {
        $this->expr = new FunctionCall('define', [$symbol, $value]);
    }

    public function render(array $args = array()) {
        return $this->expr->render($args) . ';';
    }

}





