<?php
namespace CodeGen\Statement;
use CodeGen\Renderable;
use CodeGen\Line;

class RequireOnceStatement extends Line implements Renderable
{
    public $expr;

    public function __construct(Renderable $expr) {
        $this->expr = $expr;
    }

    public function render(array $args = array()) {
        return 'require_once ' . $this->expr->render($args) . ';';
    }
}



