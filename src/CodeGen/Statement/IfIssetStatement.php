<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Statement\ElseIfStatement;
use CodeGen\Statement\IfStatement;
use CodeGen\Block;
use CodeGen\Renderable;
use CodeGen\VariableDeflator;
use CodeGen\Utils;
use CodeGen\Variable;

class ArrayIssetExpr implements Renderable
{
    protected $keys;

    protected $var;

    public function __construct(Variable $var, $keys)
    {
        $this->var = $var;
        $this->keys = (array) $keys;
    }

    public function render(array $args = array())
    {
        $out = 'isset(' . $this->var->render($args);
        foreach ($this->keys as $key) {
            if ($key === null) {
                $out .= '[]';
            } else {
                $out .= '[' . VariableDeflator::deflate($key) . ']';
            }
        }
        $out .= ')';
        return $out;
    }
}


class IfIssetStatement extends IfStatement
{
    public function __construct(Variable $var, $keys, $block = NULL)
    {
        parent::__construct(new ArrayIssetExpr($var, $keys), $block);
    }
}





