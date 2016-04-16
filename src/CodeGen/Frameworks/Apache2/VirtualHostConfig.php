<?php
namespace CodeGen\Frameworks\Apache2;
class VirtualHostConfig
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
    public function setServerAdmin($serverAdmin)
    {
        $this->serverAdmin = $serverAdmin;
    }
    public function getServerAdmin()
    {
        return $this->serverAdmin;
    }
    public function setServerPath($serverPath)
    {
        $this->serverPath = $serverPath;
    }
    public function getServerPath()
    {
        return $this->serverPath;
    }
    public function addServerAlias($entry)
    {
        $this->serverAliases[] = $entry;
    }
    public function removeServerAlias($entry)
    {
        $pos = array_search($entry, $this->serverAliases, true);
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
    public function addRewriteRule($entry)
    {
        $this->rewriteRules[] = $entry;
    }
    public function removeRewriteRule($entry)
    {
        $pos = array_search($entry, $this->rewriteRules, true);
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
    public function addEnv($key, $entry)
    {
        $this->env[$key] = $entry;
    }
    public function removeEnv($key)
    {
        unset($this->env[$key]);
        return true;
    }
    public function setEnv($env)
    {
        $this->env = $env;
    }
    public function getEnv()
    {
        return $this->env;
    }
}
