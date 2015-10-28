<?php
namespace CodeGen\Statement;

use CodeGen\Block;
use CodeGen\Renderable;
use CodeGen\Utils;

class TryCatchStatement extends Block implements Renderable
{
    protected $catchClass;
    protected $catchClassAlias;

    public $tryBlock;
    public $throwBlock;


    public function __construct($catchClass = '\Exception', $catchClassAlias = '$e', $tryBlock = NULL, $throwBlock = NULL)
    {
        $this->catchClass = $catchClass;
        $this->catchClassAlias = $catchClassAlias;
        if ($tryBlock) {
            $this->tryBlock = Utils::evalCallback($tryBlock);
        } else {
            $this->tryBlock = new Block();
        }
        if ($throwBlock) {
            $this->throwBlock = Utils::evalCallback($throwBlock);
        } else {
            $this->throwBlock = new Block();
        }
    }

    public function render(array $args = array())
    {
        $this->tryBlock->setIndentLevel($this->indentLevel + 1);
        $this->throwBlock->setIndentLevel($this->indentLevel + 1);

        $this[] = 'try {';
        $this[] = $this->tryBlock;
        $this[] = '}catch  (' . $this->catchClass . ' ' . $this->catchClassAlias . ') {';
        $this[] = $this->throwBlock;
        $this[] = '}';

        return parent::render($args);
    }

}







