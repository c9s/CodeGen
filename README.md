CodeGen
============================
[![Build Status](https://travis-ci.org/c9s/CodeGen.svg?branch=master)](https://travis-ci.org/c9s/CodeGen)
[![Latest Stable Version](https://poser.pugx.org/corneltek/codegen/v/stable)](https://packagist.org/packages/corneltek/codegen) 
[![Total Downloads](https://poser.pugx.org/corneltek/codegen/downloads)](https://packagist.org/packages/corneltek/codegen) 
[![Monthly Downloads](https://poser.pugx.org/corneltek/codegen/d/monthly)](https://packagist.org/packages/corneltek/codegen)
[![Daily Downloads](https://poser.pugx.org/corneltek/codegen/d/daily)](https://packagist.org/packages/corneltek/codegen)
[![Latest Unstable Version](https://poser.pugx.org/corneltek/codegen/v/unstable)](https://packagist.org/packages/corneltek/codegen) 
[![License](https://poser.pugx.org/corneltek/codegen/license)](https://packagist.org/packages/corneltek/codegen)

Transform your dynamic calls to static calls!

## UserClass

### Creating UserClass

```php
use CodeGen\UserClass;
$cls = new UserClass('FooClass');
$code = $cls->render();
```

### Implementing an interface

```php
$cls = new UserClass('FooClass');
$cls->implementClass('iface');
```

### Adding properties

```php
$cls->addPublicProperty('foo');
$cls->addPublicProperty('foo', 1);
$cls->addPublicProperty('foo', ['foo','bar']);
```


```php
$cls->addProtectedProperty('foo');
$cls->addProtectedProperty('foo', 1);
$cls->addProtectedProperty('foo', ['foo','bar']);
```

### Adding class methods

```php
$cls->addMethod('public','getName',[],['return $this->name;']);
```

```php
$cls->addMethod('public','setName',['$name'],['$this->name = $name;']);
```

### Generating class file by PSR-0 or PSR-4

```php
$cls->generatePsr0ClassUnder('src'); // This places 'Foo\Bar' at src/Foo/Bar.php
```

```php
$cls->generatePsr4ClassUnder('src/Zoo'); // This places 'My\Foo\Bar' at src/Zoo/Bar.php
```




### Generating `require_once` statement

```php
use CodeGen\Constant;
use CodeGen\Statement\RequireOnceStatement;
$varfile = new Constant('file.php');
$requireStmt = new RequireStatement($varfile);
```

### Generating `require` statement

```php
use CodeGen\Constant;
use CodeGen\Statement\RequireStatement;
$varfile = new Constant('file.php');
$requireStmt = new RequireStatement($varfile);
```

```php
use CodeGen\Constant;
use CodeGen\Variable;
use CodeGen\Statement\RequireStatement;
$varfile = new Variable('$file');
$requireStmt = new RequireStatement($varfile);
```

