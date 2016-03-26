<?php
namespace CodeGen\Expr;

use CodeGen\Renderable;
use CodeGen\VariableDeflator;

class ConcatExpr implements Renderable
{
    protected $subexprs = [];

    public function __construct()
    {
        $this->subexprs = func_get_args();
    }

    public function render(array $args = array())
    {
        $outs = [];
        foreach ($this->subexprs as $expr) {
            $outs[] = VariableDeflator::deflate($expr);
        }
        return join(' . ', $outs);
    }

}




