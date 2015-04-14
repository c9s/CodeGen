<?php
namespace CodeGen\Expr;
use CodeGen\VariableDeflator;
use CodeGen\Renderable;

class AssignExpr implements Renderable
{

    protected $lvalue;

    protected $expr;

    public function __construct($lvalue, $expr) 
    {
        $this->lvalue = $lvalue;
        $this->expr = $expr;
    }


    public function render(array $args = array()) 
    {
        return $this->lvalue . ' = ' . VariableDeflator::deflate($this->expr);
    }

}




