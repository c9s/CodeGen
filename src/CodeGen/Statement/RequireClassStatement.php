<?php
namespace CodeGen\Statement;
use CodeGen\Renderable;
use CodeGen\Line;
use ReflectionClass;

class RequireClassStatement extends RequireStatement
{
    public function __construct($class)
    {
        $refl = new ReflectionClass($class);
        $file = $refl->getFileName();
        $this->expr = $file;
    }
}



