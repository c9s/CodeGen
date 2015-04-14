<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Block;
use CodeGen\Renderable;
use CodeGen\VariableDeflator;
use CodeGen\Utils;

class IfElseStatement extends IfStatement implements Renderable
{
    public $else;

    protected $elifs = [];

    public function __construct(Renderable $condition, $ifblock = NULL, $else = NULL)
    {
        parent::__construct($condition, $ifblock);
        
        if ($else) {
            $this->else = Utils::evalCallback($else);
        }
    }

    public function render(array $args = array()) 
    {
        $this->if->setIndentLevel($this->indentLevel + 1);
        $this[] = 'if (' . VariableDeflator::deflate($this->condition) . ') {';
        $this[] = $this->if;

        if ($this->else) {
            $this[] = '} else {';
            $this->else->setIndentLevel($this->indentLevel + 1);
            $this[] = $this->else;
            $this[] = '}';
        } else {
            $this[] = '}';
        }
        return Block::render($args);
    }
}
