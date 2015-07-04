CodeGen
============================

Transform your dynamic calls to static calls!


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/c9s/codegen/trend.png)](https://bitdeli.com/free "Bitdeli Badge")


### Generating require statement

```php
$varfile = new Constant('file.php');
$requireStmt = new RequireStatement($varfile);
```

```php
$varfile = new Variable('$file');
$requireStmt = new RequireStatement($varfile);
```

