CodeGen
============================

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

