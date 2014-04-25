ClassTemplate
============================

ClassTemplate library is used for generating static PHP class files from a programmable interface with PHP.

SYNOPSIS
-------------

```php
$class1 = new ClassTemplate\ClassTemplate('Foo\\Bar22',array(
    'template' => 'Class.php.twig',
    'template_dirs' => array('src/ClassTemplate/Templates'),
));
ok($class1);

$class1->addMethod('public','getTwo',array(),'return 2;');
$class1->addMethod('public','getFoo',array('i'),'return $i;');
$code = $class1->render();
```

The above code outpus:

```php

<?php
namespace Foo;
class Bar22 {
    public function getTwo() {
        return 2;
    }

    public function getFoo($i) {
        return $i;
    }
}
```


INSTALL
------------------

