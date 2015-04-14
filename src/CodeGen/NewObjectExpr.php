<?php
namespace CodeGen;
use Exception;
use CodeGen\Renderable;
use CodeGen\Raw;
use CodeGen\VariableDeflator;
use LogicException;

class NewObjectExpr implements Renderable
{
    public $className;

    public $arguments = array();

    public function __construct($className, array $arguments = NULL) {
        $this->className = $className;
        if ($arguments) {
            $this->arguments = $arguments;
        }
    }

    public function setArguments(array $args)
    {
        $this->arguments = $args;
    }

    public function addArgument($arg) 
    {
        $this->arguments[] = $arg;
        return $this;
    }

    public function serializeArguments(array $args) 
    {
        $strs = array();
        foreach ($args as $arg) {
            $strs[] = VariableDeflator::deflate($arg);
        }
        return join(', ',$strs);
    }


    public function render(array $args = array()) {
        return 'new ' . $this->className . '(' . $this->serializeArguments($this->arguments) . ')';
    }

    public function __toString() {
        return $this->render();
    }
    
}



