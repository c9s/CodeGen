<?php
namespace CodeGen\Frameworks\Apache2;

class DirectoryDirectiveGroup extends BaseDirectiveGroup
{
    /**
     * @var string
     * @synthesize
     */
    protected $path;



    /**
     * @var string[]
     * @synthesize
     */
    protected $options;

    /**
     * @var string
     * @synthesize
     */
    protected $allowOverride;


    /**
     * @var string
     * @synthesize
     * // Require all denied
     */
    protected $require;

    public function __construct($path)
    {
        $this->path = $path;
        parent::__construct('Directory');
    }


    public function generate($level = 0)
    {
        $out = [];
        $out[] = str_repeat('  ', $level) . "<{$this->tag} {$this->path}>";
        $level++;

        $this->buildDynamicDirectives($out, $level);

        $this->outputDirective($out, $level, "Require", $this->require);
        $this->outputDirective($out, $level, "AllowOverride", $this->allowOverride);
        $this->outputDirective($out, $level, "Options", $this->options);

        $level--;
        $out[] = str_repeat('  ', $level) . "</{$this->tag}>";
        return join("\n",$out);
    }
}

