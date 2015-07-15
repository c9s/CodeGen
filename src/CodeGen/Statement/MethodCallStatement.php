<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Expr\AssignExpr;
use CodeGen\Expr\MethodCallExpr;
use CodeGen\VariableDeflator;
use CodeGen\Renderable;

class MethodCallStatement extends Statement implements Renderable
{
    protected $methodCallExpr;

    public function __construct($objectName = '$this', $method = NULL, array $arguments = array())
    {
        $this->methodCallExpr = new MethodCallExpr($objectName, $method, $arguments);
    }

    public function render(array $args = array()) 
    {
        return $this->methodCallExpr->render($args) . ';';
    }
}




