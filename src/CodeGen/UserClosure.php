<?php
namespace CodeGen;

class UserClosure extends BracketedBlock implements Renderable
{
    protected $arguments = array();

    protected $bodyArguments = array();

    protected $useArguments = array();

    /**
     * @var Block
     *
     * The body block
     */
    protected $block;

    public function __construct(array $arguments = array(), array $useArguments = array(), $body = '', array $bodyArguments = array())
    {
        $this->arguments = $arguments;
        $this->useArguments = $useArguments;
        $this->block = new BracketedBlock;
        if ($body) {
            $this->setBody($body);
        }
        if ($bodyArguments) {
            $this->setDefaultArguments($bodyArguments);
        }
    }

    protected function renderArguments()
    {
        return implode(', ', $this->arguments);
    }

    protected function renderUse() {
        return implode(', ', $this->useArguments);
    }

    public function render(array $args = array())
    {
        $tab = Indenter::indent($this->indentLevel);
        $out = $tab . 'function (' . $this->renderArguments() . ")";
        if (!empty($this->useArguments)) {
            $out .= ' use (' . $this->renderUse() . ')';
        }
        $out .= " {\n";
        $this->increaseIndentLevel(); // increaseIndentLevel to indent the inner block.
        $out .= Block::render($args);
        $out .= $tab . "}\n";
        return $out;
    }
}

