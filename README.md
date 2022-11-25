# Ipv6Gen

[![Latest version][ico-version]][link-packagist]
[![Software License][ico-license]][link-license]

Ipv6Gen is a random IPv6 address generator with subnet.

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
$generator = new \Mahelbir\Ipv6Gen(['xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx', 64]);
echo $generator->getIP(); # xxxx:xxxx:xxxx:xxxx:371f:c0c7:b89e:d500


$generator = new \Mahelbir\Ipv6Gen(['xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx', 32]);
print_r($generator->getIPs(5));
   # [0] => xxxx:xxxx:1cb6:2779:c8a2:1215:ed02:7679
   # [1] => xxxx:xxxx:6c87:4d23:e4e3:cfd4:6906:fe39
   # [2] => xxxx:xxxx:aeb9:759f:1d75:d153:dd50:3b48
   # [3] => xxxx:xxxx:09ec:2d23:4570:a57f:7929:dd22
   # [4] => xxxx:xxxx:56bc:9236:2455:dba5:791f:7d0d
```

## License

The MIT License (MIT). Please see [License File][link-license] for more information.

[ico-version]: https://img.shields.io/packagist/v/mahelbir/ipv6gen.svg?style=flat-square

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mahelbir/ipv6gen

[link-license]: LISENCE