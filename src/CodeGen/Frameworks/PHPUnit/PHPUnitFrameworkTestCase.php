<?php
namespace CodeGen\Frameworks\PHPUnit;
use CodeGen\UserClass;
use Doctrine\Common\Inflector\Inflector;
use CodeGen\ClassMethod;

class PHPUnitFrameworkTestCase extends UserClass
{
    public function __construct($className) 
    {
        parent::__construct($className);
        $this->extendClass('PHPUnit_Framework_TestCase', true);
    }

    public function addTest($testName) 
    {
        $methodName = Inflector::camelize('test' . ucfirst($testName));
        $testMethod = new ClassMethod($methodName, [], []);
        $testMethod->setScope('public');
        $this->methods[] = $testMethod;
        return $testMethod;
    }
}




