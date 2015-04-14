<?php
namespace CodeGen;
use CodeGen\Renderable;

class ClassStaticVariable extends ClassProperty implements Renderable
{
    public function render(array $args = array())
    {
        return Indenter::indent($this->indentLevel) . $this->scope . ' static $' . $this->name . ' = ' . var_export($this->value,true) . ';';
    }

    public function __toString() {
        return $this->render();
    }
}

