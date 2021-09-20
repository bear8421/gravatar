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
     * @param string $username  Username on Gravatar you need Get
     * @param int    $size      Sizing of Gravatar Output
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
     * @param int    $size
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/20/2021 14:39
     */
    function gravatarUrlWithEmail($email = 'dev@nguyenanhung.com', $size = 300)
    {
        $email = md5($email);

        return 'https://www.gravatar.com/avatar/' . $email . '?s=' . $size;
    }
}
