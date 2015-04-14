<?php
namespace CodeGen;

class UseClass extends Statement implements Renderable
{
    public $as;
    public $class;

    public function __construct($class,$as = null)
    {
        $this->class = ltrim( $class , '\\' );
        $this->as = $as ? ltrim($as,'\\') : null;
    }

    public function render(array $args = array())
    {
        $code = 'use ' . $this->class;
        if( $this->as ) {
            $code .= ' ' . $this->as;
        }
        return $code . ';';
    }
}
