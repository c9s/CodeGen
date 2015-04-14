<?php
namespace CodeGen;
use Exception;
use CodeGen\Renderable;
use CodeGen\Raw;
use CodeGen\VariableDeflator;
use LogicException;

/**
 * This is a shorthand class for generating $this->foo( ... );
 */
class SelfMethodCallExpr extends MethodCallExpr
{
    public function __construct($method = NULL, array $arguments = NULL) {
        parent::__construct('$this');
    }
}

