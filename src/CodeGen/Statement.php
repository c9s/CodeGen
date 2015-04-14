<?php
namespace CodeGen;
use CodeGen\Renderable;

class Statement extends Line implements Renderable
{
    public $expr;

    public function __construct(Renderable $expr) {
        $this->expr = $expr;
    }

    public function render(array $args = array()) {
        return $this->expr->render($args) . ';';
    }

}



