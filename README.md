# Komicho formatTime
Reconfigure the time format

### Install via composer

Add orm to composer.json configuration file.
```
$ composer require komicho/formatTime
```

And update the composer
```
$ composer update
```
    
## code
```php
require 'vendor/autoload.php';

use komicho\formatTime as ktf;

$time = new ktf([
    'lang' => 'ar'
]);

echo $time -> between(1505466647) . '<br/>';

echo $time -> between(1505466647, 1505466721) . '<br/>';

echo $time -> date_time(1505466647);
```