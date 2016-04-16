<?php
namespace CodeGen\Frameworks\Apache2;
class VirtualHostConfig
    extends \CodeGen\Frameworks\Apache2\VirtualHostProperties
{
    public function setDocumentRoot($entry)
    {
        $this->documentRoot = $entry;
    }
    public function getDocumentRoot()
    {
        return $this->documentRoot;
    }
    public function setServerName($entry)
    {
        $this->serverName = $entry;
    }
    public function getServerName()
    {
        return $this->serverName;
    }
    public function setServerAdmin($entry)
    {
        $this->serverAdmin = $entry;
    }
    public function getServerAdmin()
    {
        return $this->serverAdmin;
    }
    public function setServerPath($entry)
    {
        $this->serverPath = $entry;
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
    public function setServerAliases(array $entry)
    {
        $this->serverAliases = $entry;
    }
    public function getServerAliases()
    {
        return $this->serverAliases;
    }
    public function setCustomLog($entry)
    {
        $this->customLog = $entry;
    }
    public function getCustomLog()
    {
        return $this->customLog;
    }
    public function setErrorLog($entry)
    {
        $this->errorLog = $entry;
    }
    public function getErrorLog()
    {
        return $this->errorLog;
    }
    public function setProxyPreserverHost($entry)
    {
        $this->proxyPreserverHost = $entry;
    }
    public function getProxyPreserverHost()
    {
        return $this->proxyPreserverHost;
    }
    public function setProxyPass($entry)
    {
        $this->proxyPass = $entry;
    }
    public function getProxyPass()
    {
        return $this->proxyPass;
    }
    public function setProxyPassReverse($entry)
    {
        $this->proxyPassReverse = $entry;
    }
    public function getProxyPassReverse()
    {
        return $this->proxyPassReverse;
    }
    public function setRewriteEngine($entry)
    {
        $this->rewriteEngine = $entry;
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
    public function setRewriteRules(array $entry)
    {
        $this->rewriteRules = $entry;
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
    public function setEnv(array $entry)
    {
        $this->env = $entry;
    }
    public function getEnv()
    {
        return $this->env;
    }
}
