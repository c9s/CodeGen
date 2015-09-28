<?php
namespace CodeGen\Expr;
use Exception;
use CodeGen\Renderable;
use CodeGen\Raw;
use CodeGen\VariableDeflator;
use LogicException;

class MethodCall implements Renderable
{
    public $className;

    public $method;

    public $arguments;

    public function __construct($className, $method = NULL, array $arguments = array()) {
        $this->className = $className;
        if ($method) {
            $this->method = $method;
        }
        $this->arguments = new ArgumentList($arguments);
    }

    public function method($name) 
    {
        $this->method = $name;
        return $this;
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

    public function render(array $args = array()) {
        return $this->className . '::' . $this->method . '(' . $this->arguments->render($args) . ')';
    }

    public function __toString() {
        return $this->render();
    }
    
}



