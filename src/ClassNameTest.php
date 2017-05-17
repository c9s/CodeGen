<?php

namespace CodeGen;

use CodeGen\Testing\CodeGenTestCase;
use CodeGen\Statement\RequireStatement;
use CodeGen\Statement\RequireOnceStatement;
use CodeGen\Statement\Statement;
use CodeGen\Expr\AssignExpr;

class ClassNameTest extends CodeGenTestCase
{
    public function testSimpleClassName()
    {
        $className = new ClassName('Foo\Bar');
        $this->assertEquals('Bar', $className->getName() );
        $this->assertEquals('Foo\Bar', $className->getFullName() );
        $this->assertCodeEqualsFile('tests/data/class_name.fixture', $className);
    }

    public function testClassNameWithRootNamespace()
    {
        $className = new ClassName('\Foo\Bar');
        $this->assertEquals('Bar', $className->getName() );
        $this->assertEquals('\Foo\Bar', $className->getFullName() );
        $this->assertCodeEqualsFile('tests/data/class_name_root.fixture', $className);
    }
}

