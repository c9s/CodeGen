<?php
namespace CodeGen\Statement;
use CodeGen\Statement\Statement;
use CodeGen\Expr\AssignExpr;
use CodeGen\VariableDeflator;
use CodeGen\Renderable;
use CodeGen\Exception\InvalidArgumentTypeException;

class ConditionalStatement
    extends Statement
    implements Renderable
{
    protected $conditions = array();

    protected $elseBlock;

    public function __construct($expr, $then, $elseBlock = null)
    {
        $this->conditions[] = array($expr, $then);
        $this->elseBlock = $elseBlock;
    }

    public function when($expr, $then)
    {
        $this->conditions[] = array($expr, $then);
    }

    public function render(array $args = array())
    {
        foreach ($this->conditions as $condition) {
            list($expr, $code) = $condition;

            $ret = false;
            if (is_callable($expr)) {
                $ret = call_user_func($expr);
            } else if (is_bool($expr)) {
                $ret = $expr;
            } else {
                $ret = $expr ? true : false;
            }

            if ($ret) {
                if (is_callable($code)) {
                    $code = call_user_func($code);
                }

                if (is_string($code)) {
                    return $code;
                } else if ($code instanceof Renderable) {
                    return $code->render($args);
                } else {
                    throw new InvalidArgumentTypeException("Unsupported line object type", $line, array('string', 'Renderable'));
                }
            }
        }

        if ($this->elseBlock) {
            if (is_string($this->elseBlock)) {
                return $this->elseBlock;
            } else if ($this->elseBlock instanceof Renderable) {
                return $this->elseBlock->render($args);
            } else {
                throw new InvalidArgumentTypeException("Unsupported line object type", $line, array('string', 'Renderable'));
            }
        }
        return $output;
    }
}





