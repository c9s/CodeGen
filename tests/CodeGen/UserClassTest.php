<?php
use CodeGen\UserClass;

class UserClassTest extends PHPUnit_Framework_TestCase
{
    public function testUserClassImplement()
    {
        $cls = new UserClass('impl');
        $cls->implementClass('iface');
        $actual = $cls->render();
        $this->assertStringEqualsFile('tests/data/user_class_implement.fixture', $cls->render());
    }
}
