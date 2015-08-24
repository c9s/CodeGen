<?php
namespace CodeGen\Generator;
use CodeGen\UserClass;


/**
 * Unfinished
 */
class ArrayAccessGenerator
{
    protected $class;

    public function __construct(UserClass $class)
    {
        $this->class = $class;
    }

    public function generate($targetProperty, UserClass $class)
    {
        $class = $this->class;
        // $class->addMethod('public', 'offsetSet');
    }
}




