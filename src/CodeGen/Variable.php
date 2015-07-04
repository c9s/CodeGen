<?php
namespace CodeGen;
use CodeGen\Renderable;
use CodeGen\Utils;

class Variable implements Renderable
{
    protected $name;

    protected $applyTemplate = false;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setApplyTemplate($applyTemplate = true) 
    {
        $this->applyTemplate = $applyTemplate;
    }

    static public function template($name)
    {
        $var = new self($name);
        $var->setApplyTemplate(true);
        return $var;
    }

    public function render(array $args = array()) 
    {
        if ($this->applyTemplate) {
            return Utils::renderStringTemplate($this->name, $args);
        }
        return $this->name;
    }
}





