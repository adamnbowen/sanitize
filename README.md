Sanitize
========

Sanitizes arbitrary objects and arrays

```php
<?php
use Sanitize\Sanitize;

$sanitized = Sanitize::Clean($_POST);
$sanitized->foo; // == a sanitized $_POST['foo'] OR null
```

Coding Standards
----------------
Use the following coding standards in order:

1. [PSR-0 Autoloading Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md)
1. [PSR-1 Basic Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md)
1. [PSR-2 Coding Style Guide](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md)
1. [Zend Framework Coding Standard for PHP](http://framework.zend.com/manual/en/coding-standard.html)
1. [PEAR Coding Standards](http://pear.php.net/manual/en/standards.php)