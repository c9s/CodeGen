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

    public function testGeneratedApacheConfig()
    {
        $g = new AccessorClassGenerator([
            'namespace' => 'CodeGen\Frameworks\Apache2',
            'class_name' => 'ApacheSiteConfig',
        ]);
        $appClass = $g->generate(new VirtualHostProperties);
        $appClass->generatePsr4ClassUnder('src/CodeGen/Frameworks/Apache2/');
    }

}
