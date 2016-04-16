<?php
use CodeGen\Testing\CodeGenTestCase;
use CodeGen\Generator\AccessorClassGenerator;
use CodeGen\Frameworks\Apache2\VirtualHostProperties;

class AccessorClassGeneratorTest extends CodeGenTestCase
{
    public function testAccessorClassGenerator()
    {
        $g = new AccessorClassGenerator([
            'prefix' => 'App',
        ]);
        $appClass = $g->generate(new VirtualHostProperties);
        $this->assertCodeEqualsFile('tests/data/accessor_class_generator_apache2.fixture', $appClass);
    }

}
