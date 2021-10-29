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
$ composer require andrey-helldar/verbose
```

Or manually update `require` block of `composer.json` and run `composer update`.

```json
{
    "require": {
        "andrey-helldar/verbose": "^1.1"
    }
}
```

## Using

```php
use Helldar\Verbose\Services\Logger;
use Helldar\Verbose\Facades\Log;

Logger::io($this->getIO());

Log::write('foo');
Log::write('bar');
Log::write('baz');
```

## License

This package is licensed under the [MIT License](LICENSE).


## For Enterprise

Available as part of the Tidelift Subscription.

The maintainers of `andrey-helldar/verbose` and thousands of other packages are working with Tidelift to deliver commercial support and maintenance for the open source packages you use to build your applications. Save time, reduce risk, and improve code health, while paying the maintainers of the exact packages you use. [Learn more](https://tidelift.com/subscription/pkg/packagist-andrey-helldar-verbose?utm_source=packagist-andrey-helldar-verbose&utm_medium=referral&utm_campaign=enterprise&utm_term=repo).

[badge_downloads]:      https://img.shields.io/packagist/dt/andrey-helldar/verbose.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/andrey-helldar/verbose.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/andrey-helldar/verbose?label=stable&style=flat-square

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/andrey-helldar/verbose
