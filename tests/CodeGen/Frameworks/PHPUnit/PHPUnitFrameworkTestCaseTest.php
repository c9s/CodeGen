<?php
use CodeGen\Testing\CodeGenTestCase;
use CodeGen\LicenseBlock;
use CodeGen\Frameworks\PHPUnit\PHPUnitFrameworkTestCase;

class PHPUnitFrameworkTestCaseTest extends CodeGenTestCase
{
    public function testGeneratingTestCase()
    {
        $testCase = new PHPUnitFrameworkTestCase('MyAppTest');
        $testCase->addTest('arrayIsNotEmpty');
        $this->assertCodeEqualsFile('tests/data/frameworks/phpunit/phpunit_testcase.fixture', $testCase);
    }
}

