<?php
namespace CodeGen;
use CodeGen\Utils;
use CodeGen\Renderable;
use CodeGen\Indenter;

class ClassMethod extends UserFunction implements Renderable
{
    public $scope = 'public';

    public function setScope($scope)
    {
        $this->scope = $scope;
    }

    public function render(array $args = array())
    {
        $block = $this->getBlock();
        $block->setIndentLevel($this->indentLevel);
        return Indenter::indent($this->indentLevel)  . $this->scope . ' function ' . $this->name . '(' . $this->renderArguments() . ")\n" 
            . $block->render($args)
            ;
    }

    public function __toString() {
        return $this->render();
    }



}

