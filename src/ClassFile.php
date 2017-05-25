<?php

namespace CodeGen;

use Exception;
use ReflectionClass;
use ReflectionObject;

class ClassFile extends UserClass
{
    /**
     * constructor create a new class template object
     *
     * @param string $className
     *
     * $t = new ClassTemplate('NewClassFoo',[
     *   'template_dirs' => [ path1, path2 ],
     *   'template' => 'Class.php.twig',
     *   'template_args' => [ ... predefined template arguments ],
     *   'twig' => [ 'cache' => false, ... ]
     * ])
     *
     */
    public function __construct($className)
    {
        parent::__construct($className);
    }

    public function render(array $args = array())
    {
        return "<?php\n" . parent::render($args);
    }

    public function writeTo($file)
    {
        return file_put_contents($file, $this->render());
    }

    public function getSplFilePath()
    {
        return str_replace('\\', DIRECTORY_SEPARATOR, ltrim($this->class->getFullName(),'\\'));
    }

    public function load() {
        $tmpname = tempnam('/tmp', $this->getSplFilePath());
        if (file_put_contents($tmpname, $this->render()) != false) {
            return require $tmpname;
        }
        throw new Exception("Can not load class file $tmpname");
    }
}

