<?php
namespace CodeGen\Frameworks\Apache2;

class Directory
    extends \CodeGen\Frameworks\Apache2\DirectoryDirectiveGroup
{

    public function setPath($entry)
    {
        $this->path = $entry;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function addOption($entry)
    {
        $this->options[] = $entry;
    }

    public function removeOption($entry)
    {
        $pos = array_search($entry, $this->options, true);
        if ($pos !== -1) {
            unset($this->options[$pos]);
            return true;
        }
        return false;
    }

    public function setOptions(array $entries)
    {
        $this->options = $entries;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setAllowOverride($entry)
    {
        $this->allowOverride = $entry;
    }

    public function getAllowOverride()
    {
        return $this->allowOverride;
    }

    public function setRequire($entry)
    {
        $this->require = $entry;
    }

    public function getRequire()
    {
        return $this->require;
    }
}
