<?php
use CodeGen\Expr\AssignExpr;
use CodeGen\Expr\ConcatExpr;
use CodeGen\Raw;
use CodeGen\Statement\Statement;
use CodeGen\Testing\CodeGenTestCase;

class ConcatExprTest extends CodeGenTestCase
{
    public function test()
    {
        $concat = new ConcatExpr('foo1', 'bar2');
        $this->assertCodeEquals("'foo1' . 'bar2'", $concat);
    }
}

