CodeGen
============================
[![Latest Stable Version](https://poser.pugx.org/corneltek/codegen/v/stable)](https://packagist.org/packages/corneltek/codegen) 
[![Total Downloads](https://poser.pugx.org/corneltek/codegen/downloads)](https://packagist.org/packages/corneltek/codegen) 
[![Monthly Downloads](https://poser.pugx.org/corneltek/codegen/d/monthly)](https://packagist.org/packages/corneltek/codegen)
[![Daily Downloads](https://poser.pugx.org/corneltek/codegen/d/daily)](https://packagist.org/packages/corneltek/codegen)
[![Latest Unstable Version](https://poser.pugx.org/corneltek/codegen/v/unstable)](https://packagist.org/packages/corneltek/codegen) 
[![License](https://poser.pugx.org/corneltek/codegen/license)](https://packagist.org/packages/corneltek/codegen)

Transform your dynamic calls to static calls!

### Generating class

```php
use CodeGen\UserClass;
$cls = new UserClass('impl');
$cls->implementClass('iface');
$cls->addMethod( ...);
$actual = $cls->render();
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

