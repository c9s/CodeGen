<?php
namespace CodeGen;

class StaticClassMethod extends ClassMethod
{
    /**
     * @param array $args
     * @return string
     */
    public function render(array $args = array())
    {
        $block = $this->getBlock();
        $block->setIndentLevel($this->indentLevel);
        return Indenter::indent($this->indentLevel) . $this->scope . ' static function ' . $this->name . '(' . $this->renderArguments() . ")\n"
        . $block->render($args);
    }
}
