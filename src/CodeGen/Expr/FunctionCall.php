<?php
namespace CodeGen\Expr;
use Exception;
use CodeGen\Renderable;
use CodeGen\Raw;
use CodeGen\VariableDeflator;
use CodeGen\ArgumentList;
use LogicException;

/**
 * CallExpr is basically the same thing as method call, 
 * but it allows you to change the method call operator.
 */
class FunctionCall implements Renderable
{
    /**
     * @var Variable|string
     */
    public $function;

    public $arguments;

    public function __construct($function, array $arguments = array())
    {
        $this->function = $function;
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
        return $this->function . '(' . $this->arguments->render($args) . ')';
    }

    public function __toString()
    {
        return $this->render();
    }
    
}



