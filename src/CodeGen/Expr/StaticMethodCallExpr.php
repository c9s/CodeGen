<?php
namespace CodeGen\Expr;
use Exception;
use CodeGen\Renderable;
use CodeGen\Raw;
use CodeGen\VariableDeflator;
use LogicException;

class MethodCallExpr implements Renderable
{
    public $className;

    public $method;

    public $arguments = array();

    public function __construct($className, $method = NULL, array $arguments = NULL) {
        $this->className = $className;
        if ($method) {
            $this->method = $method;
        }
        if ($arguments) {
            $this->arguments = $arguments;
        }
    }

    public function method($name) 
    {
        $this->method = $name;
        return $this;
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
        return $this->className . '::' . $this->method . '(' . $this->serializeArguments($this->arguments) . ')';
    }

    public function __toString() {
        return $this->render();
    }
    
}



