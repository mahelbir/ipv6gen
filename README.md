# Ipv6Gen

[![Latest version][ico-version]][link-packagist]
[![Software License][ico-license]][link-license]

Ipv6Gen is a random IPv6 address generator by subnet.

This tool is tailored for network testing and configuration, offering a straightforward solution for generating subnet-specific IPv6 addresses efficiently.

## Requirements

PHP 7.1+

## Installation

Simply add a dependency on `mahelbir/ipv6gen` to your composer.json file if you
use [Composer](https://getcomposer.org/) to manage the dependencies of your project:

```sh
composer require mahelbir/ipv6gen
```

Although it's recommended to use Composer, you can actually include files anyway you want.

## Usage

```php
$generator = new \Mahelbir\Ipv6Gen('ffff:ffff:ffff:ffff:ffff:ffff:ffff:ffff', 64);
echo $generator->getIP(); # ffff:ffff:ffff:ffff:b7e4:e549:5173:484d


$generator = new \Mahelbir\Ipv6Gen('ffff:ffff:ffff:ffff:ffff:ffff:ffff:ffff', 32);
print_r($generator->getIPs(5));
/*
    (
        [0] => ffff:ffff:ecad:7759:29d8:ac05:07b6:56d7
        [1] => ffff:ffff:4f98:df9f:b796:651e:3bff:f71e
        [2] => ffff:ffff:8e6f:b966:9f0c:6650:ba59:9ccf
        [3] => ffff:ffff:2b46:81fb:d078:ad16:06e3:c98e
        [4] => ffff:ffff:cd95:15f0:111e:4c70:dbfd:64ba
    )
 */
```

## License

The MIT License (MIT). Please see [License File][link-license] for more information.

[ico-version]: https://img.shields.io/packagist/v/mahelbir/ipv6gen.svg?style=flat-square

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mahelbir/ipv6gen

[link-license]: LICENSE