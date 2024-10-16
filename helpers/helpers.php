<?php

/**
 * Project my-gravatar
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/08/2021
 * Time: 07:33
 */
if (!function_exists('gravatarUrlWithUsername')) {
    /**
     * Function gravatarUrlWithUsername
     *
     * @param string $username Username on Gravatar you need Get
     * @param int $size Sizing of Gravatar Output
     * @param string $cachePath /your/to/path for Save Cache
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/20/2021 11:01
     */
    function gravatarUrlWithUsername($username = 'nguyenanhung', $size = 300, $cachePath = '')
    {
        $gravatar = new Bear8421\Helper\Gravatar\Gravatar();
        $gravatar->setUsername($username);
        if ($cachePath !== '') {
            $gravatar->setCacheStatus(true)->setCachePath($cachePath);
        }
        $gravatar->init();
        return $gravatar->showAvatar($size);
    }
}
if (!function_exists('gravatarUrlWithEmail')) {
    /**
     * Function gravatarUrlWithEmail
     *
     * @param string $email
     * @param int $size
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/20/2021 14:39
     */
    function gravatarUrlWithEmail($email = 'dev@nguyenanhung.com', $size = 300)
    {
        // Trim leading and trailing whitespace from
        // an email address and force all characters
        // to lower case
        $address = strtolower(trim($email));

        // Create an SHA256 hash of the final string
        $hash = hash('sha256', $address);
        return 'https://www.gravatar.com/avatar/' . $hash . '?s=' . $size;
    }
}
