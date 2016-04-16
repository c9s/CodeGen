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

    public function generate() {
        $out = [];
        $out[] = "<{$this->tag}>";
        $this->buildDynamicDirectives($this->dynamicDirectives);
        $out[] = "</{$this->tag}>";
        return join("\n",$out);
    }

}




