# Verbose

Displaying verbose messages

<img src="https://preview.dragon-code.pro/TheDragonCode/verbose.svg?brand=php" alt="Verbose"/>

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]

## Installation

To get the latest version of `Verbose`, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require dragon-code/verbose
```

Or manually update `require` block of `composer.json` and run `composer update`.

```json
{
    "require": {
        "dragon-code/verbose": "^4.0"
    }
}
```

## Using

```php
use DragonCode\Verbose\Services\Logger;
use DragonCode\Verbose\Facades\Log;

Logger::io($this->getIO());

Log::write('foo');
Log::write('bar');
Log::write('baz');
```

## License

This package is licensed under the [MIT License](LICENSE).


[badge_downloads]:      https://img.shields.io/packagist/dt/andrey-helldar/verbose.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/andrey-helldar/verbose.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/andrey-helldar/verbose?label=stable&style=flat-square

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/andrey-helldar/verbose
