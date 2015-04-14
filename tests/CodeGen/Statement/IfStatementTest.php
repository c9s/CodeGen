<?php
use CodeGen\Testing\CodeGenTestCase;
use CodeGen\Statement\IfStatement;
use CodeGen\Statement\Statement;
use CodeGen\Raw;
use CodeGen\Variable;
use CodeGen\Block;

class IfStatementTest extends CodeGenTestCase
{
    public function testIfStatement()
    {
        $foo = new Variable('foo');
        $ifFoo = new IfStatement($foo, function() {
            $block = new Block;
            // $block[] = new Statement( );
            return $block;
        });
    }
}

