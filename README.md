# My Gravatar

[![Latest Stable Version](http://poser.pugx.org/bear8421/gravatar/v)](https://packagist.org/packages/bear8421/gravatar) [![Total Downloads](http://poser.pugx.org/bear8421/gravatar/downloads)](https://packagist.org/packages/bear8421/gravatar) [![Latest Unstable Version](http://poser.pugx.org/bear8421/gravatar/v/unstable)](https://packagist.org/packages/bear8421/gravatar) [![License](http://poser.pugx.org/bear8421/gravatar/license)](https://packagist.org/packages/bear8421/gravatar) [![PHP Version Require](http://poser.pugx.org/bear8421/gravatar/require/php)](https://packagist.org/packages/bear8421/gravatar)

Cái thư viện nhỏ, bóc tách dữ liệu `Gravatar` cá nhân thông qua JSON API

## Cài đặt thư viện

Thư viện này được cài đặt thông qua Composer

```shell
composer require bear8421/gravatar
```

```php
<?php
require_once __DIR__.'/vendor/autoload.php';
use Bear8421\Helper\Gravatar\Gravatar;

$gravatar = new Gravatar();
$gravatar->setCacheStatus(true)
    ->setCachePath(__DIR__.'/cache')
    ->setUsername('nguyenanhung')
    ->init();

// Get Avatar
$avatar = $gravatar->showAvatar(300);

```

## License

MIT License: https://nguyenanhung.mit-license.org/

## Liên hệ & Hỗ trợ

| Name        | Email                | Skype            | Facebook      |
|-------------|----------------------|------------------|---------------|
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Vietnam with Love <3