# My Gravatar

Cái thư viện nhỏ, bóc tách dữ liệu `Gravatar` cá nhân

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
| ----------- | -------------------- | ---------------- | ------------- |
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Vietnam with Love <3