<?php

namespace Codegen\Statement;

use CodeGen\Line;
use CodeGen\Renderable;

class ReturnStatement extends Statement
{
    /**
     * @param array $args
     * @return string
     */
    public function render(array $args = array())
    {
        return 'return ' . $this->expr->render($args) . ';';
    }
}
