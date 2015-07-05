<?php
use CodeGen\Testing\CodeGenTestCase;
use CodeGen\Statement\RequireStatement;
use CodeGen\Statement\RequireOnceStatement;
use CodeGen\Statement\Statement;
use CodeGen\Expr\AssignExpr;
use CodeGen\Raw;
use CodeGen\Constant;
use CodeGen\ArgumentList;
use CodeGen\Variable;
use CodeGen\Block;

class ArgumentListTest extends CodeGenTestCase
{
    public function testEmptyArgumentList()
    {
        $args = new ArgumentList;
        $this->assertCodeEqualsFile('tests/data/argument_list_empty.fixture', $args);
    }

    public function testSimpleArgumentList()
    {
        $args = new ArgumentList;
        $args->add(333);
        $args->add(444);
        $args->add(array( 'foo' => 222 ));
        $this->assertCodeEqualsFile('tests/data/argument_list_simple.fixture', $args);
    }

    public function testArgumentListArrayAccess()
    {
        $args = new ArgumentList;
        $args->add(333);
        $args->add(444);
        $args->add(array( 'foo' => 222 ));

        $this->assertEquals(333, $args[0]);
        $this->assertEquals(444, $args[1]);
        $this->assertSame(array('foo' => 222), $args[2]);

        $args[] = 'bar';
        $this->assertEquals('bar', $args[3]);
    }
}

