<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Statement\ElseIfStatement;
use CodeGen\Block;
use CodeGen\Renderable;
use CodeGen\VariableDeflator;
use CodeGen\Utils;

class IfStatement extends Block implements Renderable
{
    protected $condition;

    protected $ifblock;

    protected $elseIfBlocks = array();

    public function __construct(Renderable $condition, $block = NULL)
    {
        $this->condition = $condition;
        if ($block) {
            $this->ifblock = Utils::evalCallback($block);
        } else {
            $this->ifblock = new Block;
        }
    }

    /**
     * This method was named 'elif' here because we can't use 'elseif' or 'elseIf' as the
     * method name.
     *
     * @param Expr $condition
     * @param Block $block
     */
    public function elif($condition, $block) 
    {
        $this->elseIfBlocks[] = new ElseIfStatement($condition, $block);
        return $this;
    }

    public function render(array $args = array()) 
    {
        $this->ifblock->setIndentLevel($this->indentLevel + 1);
        $this[] = 'if (' . VariableDeflator::deflate($this->condition) . ') {';
        $this[] = $this->ifblock;

        $trailingBlocks = [];
        if (!empty($this->elseIfBlocks)) {
            foreach($this->elseIfBlocks as $elseIf) {
                $trailingBlocks[] = rtrim($elseIf->render($args));
            }
        }
        
        $this[] = '}' . join('',$trailingBlocks);
        return parent::render($args);
    }

}







