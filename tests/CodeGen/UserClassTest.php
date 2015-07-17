<?php
use CodeGen\UserClass;
use CodeGen\Testing\CodeGenTestCase;

class UserClassTest extends CodeGenTestCase
{
    public function testUserClassImplement()
    {
        $cls = new UserClass('impl');
        $cls->implementClass('iface');
        $this->assertCodeEqualsFile('tests/data/user_class_implement.fixture', $cls);
    }

    public function testUserClassAddMethod()
    {
        $cls = new UserClass('FooClass');
        $cls->addMethod('public', 'run', array('$a', '$b'), 'return $a + $b;');
        $this->assertCodeEqualsFile('tests/data/user_class_method.fixture', $cls);
    }
}
