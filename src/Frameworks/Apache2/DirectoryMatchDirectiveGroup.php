<?php
namespace CodeGen\Frameworks\Apache2;

class DirectoryMatchDirectiveGroup extends DirectoryDirectiveGroup
{
    /**
     * @var string
     * @synthesize
     */
    protected $pattern;

    public function __construct($pattern)
    {
        parent::__construct('DirectoryMatch');
        $this->pattern = $pattern;
    }
}




