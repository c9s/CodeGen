<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Block;
use CodeGen\Renderable;
use CodeGen\VariableDeflator;
use CodeGen\Utils;

class IfElseStatement extends IfStatement implements Renderable
{
    protected $elseblock;

    protected $elifs = [];

    public function __construct(Renderable $condition, $ifblock = NULL, $elseblock = NULL)
    {
        parent::__construct($condition, $ifblock);
        
        if ($elseblock) {
            $this->elseblock = Utils::evalCallback($elseblock);
        }
    }

    public function elif($condition, $elifblock) {
        // $this->elifs 
    }

    public function render(array $args = array()) 
    {
        $this->ifblock->setIndentLevel($this->indentLevel + 1);
        $this[] = 'if (' . VariableDeflator::deflate($this->condition) . ') {';
        $this[] = $this->ifblock;

        if ($this->elseblock) {
            $this[] = '} else {';
            $this->elseblock->setIndentLevel($this->indentLevel + 1);
            $this[] = $this->elseblock;
            $this[] = '}';
        } else {
            $this[] = '}';
        }
        return Block::render($args);
    }
}
