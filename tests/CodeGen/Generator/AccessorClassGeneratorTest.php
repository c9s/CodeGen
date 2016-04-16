<?php
use CodeGen\Testing\CodeGenTestCase;
use CodeGen\Generator\AccessorClassGenerator;
use CodeGen\Frameworks\Apache2\VirtualHostDirectiveGroup;
use CodeGen\Frameworks\Apache2\DirectoryDirectiveGroup;

class AccessorClassGeneratorTest extends CodeGenTestCase
{
    public function testAccessorClassGenerator()
    {
        $g = new AccessorClassGenerator([
            'prefix' => 'App',
        ]);
        $appClass = $g->generate(new VirtualHostDirectiveGroup);
        $this->assertCodeEqualsFile('tests/data/accessor_class_generator_apache2.fixture', $appClass);
    }

    public function testGeneratedApacheConfig()
    {
        $g = new AccessorClassGenerator([
            'namespace' => 'CodeGen\Frameworks\Apache2',
        ]);
        $appClass = $g->generate(new VirtualHostDirectiveGroup, 'VirtualHost');
        $appClass->generatePsr4ClassUnder('src/CodeGen/Frameworks/Apache2/');
        $this->assertCodeEqualsFile('tests/data/frameworks/apache2/virtualhost.fixture', $appClass);

        $appClass = $g->generate(new DirectoryDirectiveGroup('tmp'), 'Directory');
        $appClass->generatePsr4ClassUnder('src/CodeGen/Frameworks/Apache2/');
        $this->assertCodeEqualsFile('tests/data/frameworks/apache2/directory.fixture', $appClass);
    }

}
