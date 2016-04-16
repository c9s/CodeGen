<?php
namespace CodeGen\Frameworks\Apache2;

class BaseDirectiveGroup
{
    protected $tag;

    protected $dynamicDirectives = [];

    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    public function __call($method, $args)
    {
        $directiveName = ucfirst(str_replace('set', '', $method));
        $value = $args[0];
        $this->dynamicDirectives[] = "{$directiveName} {$value}";
        return $this;
    }

    public function addDirective($directive)
    {
        $this->dynamicDirectives[] = $directive;
    }

    protected function buildDynamicDirectives(array &$out)
    {
        foreach ($this->dynamicDirectives as $directive) {
            $out[] = $directive;
        }
    }

    public function generate() {
        $out = [];
        $out[] = "<{$this->tag}>";
        $this->buildDynamicDirectives($this->dynamicDirectives);
        $out[] = "</{$this->tag}>";
        return join("\n",$out);
    }


}



