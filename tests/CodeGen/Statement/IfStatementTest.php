<?php
use CodeGen\Testing\CodeGenTestCase;
use CodeGen\Statement\IfStatement;
use CodeGen\Statement\Statement;
use CodeGen\Expr\AssignExpr;
use CodeGen\Raw;
use CodeGen\Variable;
use CodeGen\Constant;
use CodeGen\Block;

class IfStatementTest extends CodeGenTestCase
{
    public function testIfStatement()
    {
        $foo = new Variable('$foo');
        $ifFoo = new IfStatement($foo, function() use ($foo) {
            $block = new Block;
            $block[] = new Statement(new AssignExpr($foo, new Constant(30)));
            return $block;
        });
        $this->assertCodeEqualsFile('tests/data/if_statement.fixture', $ifFoo);
    }
}

