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

    protected function buildDynamicDirectives(array &$out, $level = 0)
    {
        foreach ($this->dynamicDirectives as $directive) {
            if ($directive instanceof self) {
                $out[] = $directive->generate($level);
            } else {
                $out[] = str_repeat('  ', $level) . $directive;
            }
        }
    }

    protected function outputDirective(array &$out, $level = 0, $directiveName, $value = null)
    {
        if ($value == null) {
            return;
        }

        $str = str_repeat('  ', $level) . "{$directiveName} ";
        if (is_array($value)) {
            $str .= join(' ', $value);
        } else {
            $str .= $value;
        }
        $out[] = $str;
    }

    public function generate($level = 0)
    {
        $out = [];
        $out[] = "<{$this->tag}>";
        $this->buildDynamicDirectives($out, $level + 1);
        $out[] = "</{$this->tag}>";
        return join("\n",$out);
    }

    public function __toString()
    {
        return $this->generate();
    }


}



