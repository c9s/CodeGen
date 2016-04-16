<?php
namespace CodeGen\Frameworks\Apache2;
class ApacheSiteConfig
    extends \CodeGen\Frameworks\Apache2\VirtualHostProperties
{
    public function setDocumentRoot($documentRoot)
    {
        $this->documentRoot = $documentRoot;
    }
    public function getDocumentRoot()
    {
        return $this->documentRoot;
    }
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;
    }
    public function getServerName()
    {
        return $this->serverName;
    }
    public function addServerAlias($serverName)
    {
        $this->serverAliases[] = $serverName;
    }
    public function removeServerAlias($serverName)
    {
        $pos = array_search($serverName, $this->serverAliases, true);
        if ($pos !== -1) {
            unset($this->serverAliases[$pos]);
            return true;
        }
        return false;
    }
    public function setServerAliases($serverAliases)
    {
        $this->serverAliases = $serverAliases;
    }
    public function getServerAliases()
    {
        return $this->serverAliases;
    }
    public function setCustomLog($customLog)
    {
        $this->customLog = $customLog;
    }
    public function getCustomLog()
    {
        return $this->customLog;
    }
    public function setErrorLog($errorLog)
    {
        $this->errorLog = $errorLog;
    }
    public function getErrorLog()
    {
        return $this->errorLog;
    }
    public function setProxyPreserverHost($proxyPreserverHost)
    {
        $this->proxyPreserverHost = $proxyPreserverHost;
    }
    public function getProxyPreserverHost()
    {
        return $this->proxyPreserverHost;
    }
    public function setProxyPass($proxyPass)
    {
        $this->proxyPass = $proxyPass;
    }
    public function getProxyPass()
    {
        return $this->proxyPass;
    }
    public function setProxyPassReverse($proxyPassReverse)
    {
        $this->proxyPassReverse = $proxyPassReverse;
    }
    public function getProxyPassReverse()
    {
        return $this->proxyPassReverse;
    }
    public function setRewriteEngine($rewriteEngine)
    {
        $this->rewriteEngine = $rewriteEngine;
    }
    public function getRewriteEngine()
    {
        return $this->rewriteEngine;
    }
    public function addRewriteRule($rewriteEngine)
    {
        $this->rewriteRules[] = $rewriteEngine;
    }
    public function removeRewriteRule($rewriteEngine)
    {
        $pos = array_search($rewriteEngine, $this->rewriteRules, true);
        if ($pos !== -1) {
            unset($this->rewriteRules[$pos]);
            return true;
        }
        return false;
    }
    public function setRewriteRules($rewriteRules)
    {
        $this->rewriteRules = $rewriteRules;
    }
    public function getRewriteRules()
    {
        return $this->rewriteRules;
    }
}
