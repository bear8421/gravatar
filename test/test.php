<?php
/**
 * Project spreadsheets-basic
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/20/2021
 * Time: 06:02
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Bear8421\Helper\Gravatar\Gravatar;

$gravatar = new Gravatar();
$gravatar->setUsername('nguyenanhung')
         ->setCacheStatus(true)
         ->setCachePath(__DIR__ . '/../tmp')
         ->init();

echo "Avatar URL: " . $gravatar->showAvatar(300) . PHP_EOL;
echo "Avatar Data: " . json_encode($gravatar->getData()) . PHP_EOL;
echo "Avatar Properties: " . json_encode($gravatar->getProperties()) . PHP_EOL;


echo "Get Gravatar with Email: " . gravatarUrlWithEmail() . PHP_EOL;