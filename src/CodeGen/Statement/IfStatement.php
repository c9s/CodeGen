<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Block;
use CodeGen\Renderable;
use CodeGen\VariableDeflator;

class IfStatement extends Block implements Renderable
{
    protected $condition;

    protected $block;

    public function __construct(Renderable $condition, $block = NULL)
    {
        $this->condition = $condition;
        if ($block) {
            if (is_callable($block)) {
                $this->block = $block();
            } else {
                $this->block = $block;
            }
        } else {
            $this->block = new Block;
        }
    }

    public function getBlock()
    {
        return $this->block;
    }

    public function render(array $args = array()) 
    {
        $this[] = 'if (' . VariableDeflator::deflate($this->condition) . ') {';
        $this[] = $this->block;
        $this[] = '}';
        return $block->render($args);
    }

}







