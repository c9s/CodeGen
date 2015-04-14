<?php
use CodeGen\Testing\CodeGenTestCase;
use CodeGen\Statement\IfStatement;
use CodeGen\Statement\IfElseStatement;
use CodeGen\Statement\Statement;
use CodeGen\Expr\AssignExpr;
use CodeGen\Raw;
use CodeGen\Variable;
use CodeGen\Constant;
use CodeGen\Block;

class IfElseStatementTest extends CodeGenTestCase
{
    public function testIfElseStatement()
    {
        $foo = new Variable('$foo');
        $ifFoo = new IfElseStatement($foo, function() use ($foo) {
            $block = new Block;
            $block[] = new Statement(new AssignExpr($foo, new Constant(30)));
            return $block;
        }, function() use ($foo) {
            $block = new Block;
            $block[] = new Statement(new AssignExpr($foo, new Constant(20)));
            return $block;
        });
        $this->assertCodeEqualsFile('tests/data/if_else_statement.fixture', $ifFoo);
    }
}

