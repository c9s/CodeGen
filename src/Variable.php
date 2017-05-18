<?php
namespace CodeGen;

class Variable implements Renderable
{
    protected $name;

    protected $templateArgs = array();

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}





