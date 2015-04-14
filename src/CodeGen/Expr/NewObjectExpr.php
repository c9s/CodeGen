<?php
namespace CodeGen\Expr;
use Exception;
use CodeGen\Renderable;
use CodeGen\Raw;
use CodeGen\VariableDeflator;
use CodeGen\ArgumentList;
use LogicException;

class NewObjectExpr implements Renderable
{
    public $className;

    public $arguments;

    public function __construct($className, array $arguments = array()) {
        $this->className = $className;
        $this->arguments = new ArgumentList($arguments);
    }

    public function setArguments(array $args)
    {
        $this->arguments = new ArgumentList($args);
    }

    public function addArgument($arg) 
    {
        $this->arguments[] = $arg;
        return $this;
    }

    public function render(array $args = array())
    {
        return 'new ' . $this->className . '(' . $this->arguments->render($args) . ')';
    }

    public function __toString() {
        return $this->render();
    }
    
}



