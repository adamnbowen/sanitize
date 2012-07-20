sanitize
========

Sanitizes arbitrary objects and arrays

```php
<?php
$sanitized = Sanitize::Clean($_POST);
$sanitized->foo; // == $_POST['foo'] OR null
```