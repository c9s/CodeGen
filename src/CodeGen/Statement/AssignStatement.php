<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Expr\AssignExpr;
use CodeGen\VariableDeflator;
use CodeGen\Renderable;

class AssignStatement extends Statement implements Renderable
{
    protected $assignExpr;

    public function __construct($lvalue, $expr) 
    {
        $this->assignExpr = new AssignExpr($lvalue, $expr);
    }

    public function render(array $args = array()) 
    {
        return $this->assignExpr->render($args) . ';';
    }
}




