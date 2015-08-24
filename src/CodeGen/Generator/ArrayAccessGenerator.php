<?php
namespace CodeGen\Generator;
use CodeGen\UserClass;


/**
 * Unfinished
 */
class ArrayAccessGenerator
{
    public function __construct()
    {

    }

    /*
    abstract public boolean offsetExists ( mixed $offset )
    abstract public mixed offsetGet ( mixed $offset )
    abstract public void offsetSet ( mixed $offset , mixed $value )
    abstract public void offsetUnset ( mixed $offset )
    */
    public function generate($arrayPropertyName, UserClass $class)
    {
        $class->implementInterface('ArrayAccess');

        // $class->addProtectedProperty
        $class->addMethod('public', 'offsetSet', ['$key','$val'], [
            "\$this->{$arrayPropertyName}[\$key] = \$val;"
        ]);
        $class->addMethod('public', 'offsetGet', ['$key'], [
            "return \$this->{$arrayPropertyName}[\$key];"
        ]);
        $class->addMethod('public', 'offsetExists', ['$key'], [
            "return isset(\$this->{$arrayPropertyName}[\$key]);",
        ]);
        $class->addMethod('public', 'offsetUnset', ['$key'], [
            "unsetset(\$this->{$arrayPropertyName}[\$key]);",
        ]);
        return $class;
    }
}




