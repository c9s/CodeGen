<?php
use CodeGen\UserFunction;

class UserFunctionEvaluationTest extends \PHPUnit\Framework\TestCase
{
    public function testUserFunc()
    {
        $func = new UserFunction('user_foo', array('$i', '$x = 2'), 'return $i + $x;');
        $this->assertNotNull($func->render());
        eval($func->render());

        // echo $func->__toString();

        $this->assertEquals(3, user_foo(1));
        $this->assertEquals(2, user_foo(1,1));
        $this->assertEquals(3, user_foo(1,2));

    }

    public function testUserFuncWithBody()
    {
        $func = new UserFunction('user_foo_body', array('$i', '$x = 2'), 'return $i + $x * {{f}};', array('f' => 100 ));
        eval($func->render());

        // echo $func->__toString();

        $this->assertEquals(201, user_foo_body(1));
        $this->assertEquals(101, user_foo_body(1,1));
        $this->assertEquals(201, user_foo_body(1,2));
    }
}

