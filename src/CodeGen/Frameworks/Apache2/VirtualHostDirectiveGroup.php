<?php
namespace CodeGen\Frameworks\Apache2;

class VirtualHostDirectiveGroup extends BaseDirectiveGroup {

    /**
     * @var string
     * @synthesize
     */
    protected $documentRoot;

    /**
     * @var string
     * @synthesize
     */
    protected $serverName;

    /**
     * @var string
     * @synthesize
     */
    protected $serverAdmin;

    /**
     * @var string
     * @synthesize
     */
    protected $serverPath;


    /**
     * @var string[]
     * @synthesize
     */
    protected $serverAliases;

    /**
     * @var string
     * @synthesize
     */
    protected $customLog;

    /**
     * @var string
     * @synthesize
     */
    protected $errorLog;


    /**
     * @var string
     * @synthesize
     */
    protected $proxyPreserverHost;

    /**
     * @var string
     * @synthesize
     */
    protected $proxyPass;

    /**
     * @var string
     * @synthesize
     */
    protected $proxyPassReverse;

    /**
     * @var string
     * @synthesize
     */
    protected $rewriteEngine;

    /**
     * @var string
     * @synthesize
     */
    protected $rewriteBase;


    /**
     * @var string[]
     * @synthesize
     */
    protected $rewriteDirectives;

    /**
     * @var string[string]
     * @synthesize
     */
    protected $env;

    protected $bindHost;

    protected $bindPort;

    public function __construct($bindHost = '*', $bindPort = 80)
    {
        parent::__construct('VirtualHost');
        $this->bindHost = $bindHost;
        $this->bindPort = $bindPort;
    }

    public function addRewriteCond($testString, $condPattern)
    {
        $this->rewriteDirectives[] = "RewriteCond $testString $condPattern";
        return $this;
    }

    public function addRewriteRule($pattern, $substitution, $flags = "")
    {
        $this->rewriteDirectives[] = "RewriteRule $pattern $substitution $flags";
        return $this;
    }

    public function generate($level = 0)
    {
        $out = [];
        $out[] = str_repeat('  ', $level) . "<{$this->tag} {$this->bindHost}:{$this->bindPort}>";

        $level++;

        $this->outputDirective($out, $level, "ServerName", $this->serverName);
        $this->outputDirective($out, $level, "ServerPath", $this->serverPath);
        $this->outputDirective($out, $level, "ServerAdmin", $this->serverAdmin);
        $this->outputDirective($out, $level, "ServerAlias", $this->serverAliases);
        $this->outputDirective($out, $level, "DocumentRoot", $this->documentRoot);
        $this->outputDirective($out, $level, "ErrorLog", $this->errorLog);
        $this->outputDirective($out, $level, "CustomLog", $this->customLog);

        if ($this->rewriteEngine) {
            $this->outputDirective($out, $level, "RewriteEngine", $this->rewriteEngine);
            $this->outputDirective($out, $level, "RewriteBase", $this->rewriteBase);

            if (!empty($this->rewriteDirectives)) {
                foreach ($this->rewriteDirectives as $directive) {
                    $out[] = str_repeat('  ', $level) . $directive;
                }
            }
        }

        $this->buildDynamicDirectives($out, $level);

        $level--;
        $out[] = str_repeat('  ', $level) . "</{$this->tag}>";
        return join("\n", $out);
    }


}

