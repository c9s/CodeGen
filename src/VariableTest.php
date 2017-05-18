<?php

namespace CodeGen;

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

class VariableTest extends CodeGenTestCase
{
    public function testVariableRender()
    {
        $var = new Variable('$foo');
        $this->assertCodeEqualsFile('tests/data/variable.fixture', $var);
    }
}
