<?php
namespace CodeGen\Statement;

use CodeGen\Block;
use CodeGen\Renderable;
use CodeGen\Utils;

class TryCatchStatement extends Block implements Renderable
{
    /**
     * @var Block
     */
    public $tryBlock;
    /**
     * @var Block
     */
    public $throwBlock;
    /**
     * @var string
     */
    protected $catchClass;
    /**
     * @var string
     */
    protected $catchClassAlias;

    public function __construct($catchClass = '\Exception', $catchClassAlias = '$e', $tryBlock = NULL, $throwBlock = NULL)
    {
        parent::__construct();
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

        $this->lines[] = 'try {';
        $this->lines[] = $this->tryBlock;
        $this->lines[] = '}catch  (' . $this->catchClass . ' ' . $this->catchClassAlias . ') {';
        $this->lines[] = $this->throwBlock;
        $this->lines[] = '}';

        return parent::render($args);
    }

}







