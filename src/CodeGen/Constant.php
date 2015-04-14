<?php
namespace CodeGen;
use CodeGen\Renderable;

class Constant implements Renderable
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function render(array $args = array()) 
    {
        return $this->name;
    }
}





