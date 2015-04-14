<?php
namespace CodeGen\Frameworks\PHPUnit;
use CodeGen\Expr\SelfMethodCallExpr;
use CodeGen\Statement;

class Assertions
{
    static public function assertEquals($expected, $actual) {
        $expr = new SelfMethodCallExpr('assertEquals', [$expected, $actual]);
        return new Statement($expr);
    }

}



