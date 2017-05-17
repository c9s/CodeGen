<?php

namespace CodeGen;

use CodeGen\Testing\CodeGenTestCase;

class UseClassTest extends CodeGenTestCase
{
    public function testUseClass()
    {
        $cls = new UseClass('TestNamspace\testClass');

        $this->assertCodeEqualsFile('tests/data/use_class.fixture', $cls);
    }

    public function testUseClassAlias()
    {
        $cls = new UseClass('TestNamspace\testClass','testAlias');
        $this->assertCodeEqualsFile('tests/data/use_class_alias.fixture', $cls);
    }
}
