<?php
use CodeGen\Generator\AppClassGenerator;

class FooClass
{
    public $foo;

    protected $bar;

    public function __construct($foo = null, $bar = null)
    {
        if ($foo) {
            $this->foo = $foo;
        }
        if ($bar) {
            $this->bar = $bar;
        }
    }

}

class AppClassGeneratorTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $foo = new FooClass(1,2);
        $generator = new AppClassGenerator(array(
            'prefix' => 'OhMy',
        ));
        $appClass = $generator->generate($foo);
        // echo $appClass->render();

        $path = $appClass->generatePsr4ClassUnder('tests/generated'); 
        $this->assertFileExists($path);
        require_once($path);

        $this->assertTrue(class_exists('OhMyFooClass'));

        $ohMyFoo = new OhMyFooClass;
        $this->assertEquals(1, $ohMyFoo->foo);

        unlink($path);
    }
}

