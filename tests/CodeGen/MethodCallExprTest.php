<?php
use CodeGen\Raw;
use CodeGen\Expr\MethodCallExpr;

class MethodCallExprTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $call = new MethodCallExpr;
        $call->method('doSomething');
        $call->addArgument(123);
        $call->addArgument('foo');
        $call->addArgument(new Raw('new SplObjectStorage'));
        $call->addArgument(array( 'name' => 'hack' ));
        $str = $call->render();
        ok($str);
        is("\$this->doSomething(123, 'foo', new SplObjectStorage, array (\n  'name' => 'hack',\n))",$str);
    }
}

