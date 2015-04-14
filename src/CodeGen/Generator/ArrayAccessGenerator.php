<?php
namespace CodeGen\Generator;
use CodeGen\UserClass;

class ArrayAccessGenerator
{
    protected $class;

    public function __construct(UserClass $class)
    {
        $this->class = $class;
    }

    public function generate() 
    {
        $class = $this->class;
        // $class->addMethod('public', 'offsetSet');
    }
}




