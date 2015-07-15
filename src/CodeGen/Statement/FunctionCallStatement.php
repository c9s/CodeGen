<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Expr\CallExpr;
use CodeGen\VariableDeflator;
use CodeGen\Renderable;

class FunctionCallStatement extends Statement implements Renderable
{
    public function __construct($function, array $arguments = array())
    {
        $this->expr = new CallExpr(null, null, $function, $arguments);
    }
}




