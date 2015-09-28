<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Expr\AssignExpr;
use CodeGen\Expr\MethodCall;
use CodeGen\VariableDeflator;
use CodeGen\Renderable;

class MethodCallStatement extends Statement implements Renderable
{
    public function __construct($objectName = '$this', $method = NULL, array $arguments = array())
    {
        $this->expr = new MethodCall($objectName, $method, $arguments);
    }
}




