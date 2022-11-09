James PRO String to Number
======

## Requirements

* PHP version 8.0 or higher

# Easy Installation

### Install with composer

To install with [Composer](https://getcomposer.org/), simply require the
latest version of this package.

```bash
composer require james-pro/string-to-number
```

Make sure that the autoload file from Composer is loaded.

## How to use

```php
use JamesPro\StringToNumber;

$number = Format::makeNumber('123,456789',2);
echo $number;
// 123.46

$number = Format::makeNumber('123,4444456789',2);
echo $number;
// 123.45

```
