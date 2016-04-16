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

    public function generate()
    {
        $out = [];
        $out[] = "<{$this->tag} {$this->bindHost}:{$this->bindPort}>";
        if ($this->serverName) {
            $out[] = "ServerName {$this->serverName}";
        }
        if ($this->serverPath) {
            $out[] = "ServerPath {$this->serverPath}";
        }
        if ($this->serverAdmin) {
            $out[] = "ServerAdmin {$this->serverAdmin}";
        }
        if (!empty($this->serverAliases)) {
            $out[] = "ServerAlias " . join(' ', (array) $this->serverAliases);
        }
        if ($this->documentRoot) {
            $out[] = "DocumentRoot " . $this->documentRoot;
        }
        if ($this->errorLog) {
            $out[] = "ErrorLog " . $this->errorLog;
        }
        if ($this->customLog) {
            $out[] = "CustomLog " . $this->customLog;
        }

        if ($this->rewriteEngine) {
            $out[] = "RewriteEngine " . $this->rewriteEngine;

            if ($this->rewriteBase) {
                $out[] = "RewriteBase " . $this->rewriteBase;
            }

            if (!empty($this->rewriteDirectives)) {
                foreach ($this->rewriteDirectives as $directive) {
                    $out[] = $directive;
                }
            }
        }

        $this->buildDynamicDirectives($this->dynamicDirectives);

        $out[] = "</{$this->tag}>";
        return join("\n", $out);
    }


}

