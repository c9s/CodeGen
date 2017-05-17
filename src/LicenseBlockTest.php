<?php

namespace CodeGen;

use CodeGen\Testing\CodeGenTestCase;

class LicenseBlockTest extends CodeGenTestCase
{
    public function test()
    {
        $license = new LicenseBlock('mit', 2015, 'Yo-An Lin <yoanlin93@gmail.com>');
        $this->assertCodeEqualsFile('tests/data/license_block.fixture', $license);
    }
}

