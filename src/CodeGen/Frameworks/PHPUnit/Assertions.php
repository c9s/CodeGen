<?php
namespace CodeGen\Frameworks\PHPUnit;
use CodeGen\Expr\SelfMethodCallExpr;
use CodeGen\Statement\Statement;

function push_if($array, $element) 
{
    if ($element) {
        $array[] = $element;
    }
    return $array;
}

class Assertions
{
    static public function assertEquals($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertEquals', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

    static public function assertRegExp($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertRegExp', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

    static public function assertStringMatchesFormat($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertStringMatchesFormat', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

    static public function assertStringMatchesFormatFile($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertStringMatchesFormatFile', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

    static public function assertStringEqualsFile($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertStringEqualsFile', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

    static public function assertStringStartsWith($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertStringStartsWith', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

    static public function assertStringEndsWith($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertStringEndsWith', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }


    static public function assertSame($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertSame', push_if([$expected, $actual], $message) );
        return new Statement($expr);
    }

    static public function assertNull($actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertNull', push_if([$actual], $message) );
        return new Statement($expr);
    }

    static public function assertNotEmpty($actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertNotEmpty', push_if([$actual], $message));
        return new Statement($expr);
    }

    static public function assertEmpty($actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertEmpty', push_if([$actual], $message));
        return new Statement($expr);
    }

    static public function assertArrayHasKey($key, array $array, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertArrayHasKey', push_if([$key, $array], $message) );
        return new Statement($expr);
    }

    static public function assertClassHasAttribute($attribute, $class, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertClassHasAttribute', push_if([$attribute, $class], $message));
        return new Statement($expr);
    }

    static public function assertClassHasStaticAttribute($attribute, $class, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertClassHasStaticAttribute', push_if([$attribute, $class], $message));
        return new Statement($expr);
    }

    static public function assertContains($element, $array, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertContains', push_if([$element, $array], $message));
        return new Statement($expr);
    }

    static public function assertContainsOnly($element, $array, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertContainsOnly', push_if([$element, $array], $message));
        return new Statement($expr);
    }

    static public function assertCount($count, $array, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertCount', push_if([$count, $array], $message));
        return new Statement($expr);
    }

    static public function assertTrue($val, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertTrue', push_if([$val], $message));
        return new Statement($expr);
    }

    static public function assertFalse($val, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertFalse', push_if([$val], $message));
        return new Statement($expr);
    }

    static public function assertFileEquals($fileExpected, $fileActual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertFileEquals', push_if([$fileExpected, $fileActual], $message));
        return new Statement($expr);
    }

    static public function assertJsonFileEqualsJsonFile($fileExpected, $fileActual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertJsonFileEqualsJsonFile', push_if([$fileExpected, $fileActual], $message));
        return new Statement($expr);
    }

    static public function assertFileExists($fileActual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertFileExists', push_if([$fileActual], $message));
        return new Statement($expr);
    }

    static public function assertGreaterThan($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertGreaterThan', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

    static public function assertGreaterThanOrEqual($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertGreaterThanOrEqual', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

    static public function assertLessThan($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertLessThan', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

    static public function assertLessThanOrEqual($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertLessThanOrEqual', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }


    static public function assertInstanceOf($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertInstanceOf', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

    static public function assertInternalType($expected, $actual, $message = '') 
    {
        $expr = new SelfMethodCallExpr('assertInternalType', push_if([$expected, $actual], $message));
        return new Statement($expr);
    }

}



