<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Block;
use CodeGen\Renderable;
use CodeGen\VariableDeflator;
use CodeGen\Utils;

class ElseIfStatement extends IfStatement implements Renderable
{
    public function __construct(Renderable $condition, $elseifblock = NULL)
    {
        parent::__construct($condition, $elseifblock);
    }

    public function render(array $args = array()) 
    {
        return ' else ' . parent::render($args);
    }
}
