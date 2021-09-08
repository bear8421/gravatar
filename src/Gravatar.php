<?php
/**
 * Project my-gravatar
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/08/2021
 * Time: 10:38
 */

namespace Bear8421\Helper\Gravatar;

use Exception;
use nguyenanhung\PhpFileCache\PhpFileCache;

/**
 * Class Gravatar
 *
 * @package   Bear8421\Helper\Gravatar
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Gravatar
{
    use Helper;

    const USER_PATTERN = '{{username}}';

    const JSON_LINK = 'https://vi.gravatar.com/{{username}}.json';

    /** @var string $username */
    protected $username = 'nguyenanhung';

    /** @var string $jsonLink */
    protected $jsonLink;

    /** @var bool $cacheStatus */
    protected $cacheStatus = false;

    /** @var string $cachePath */
    protected $cachePath;

    /** @var object|null Object Data từ Gravatar JSON */
    protected $data;

    /**
     * Function getProperties
     *
     * @return array
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/08/2021 44:07
     */
    public function getProperties()
    {
        return [
            'username'    => $this->username,
            'cacheStatus' => $this->cacheStatus,
            'cachePath'   => $this->cachePath
        ];
    }

    /**
     * Function setUsername
     *
     * @param string $username
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/08/2021 56:42
     */
    public function setUsername($username)
    {
        $this->username = trim($username);

        return $this;
    }

    /**
     * Function setCacheStatus
     *
     * @param bool $cacheStatus
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/08/2021 43:04
     */
    public function setCacheStatus($cacheStatus = false)
    {
        $this->cacheStatus = $cacheStatus;

        return $this;
    }

    /**
     * Function setCachePath
     *
     * @param string $cachePath
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/08/2021 43:26
     */
    public function setCachePath($cachePath = '')
    {
        $this->cachePath = $cachePath;

        return $this;
    }

    /**
     * Function requestToGravatar
     *
     * @param string $url
     *
     * @return mixed
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/08/2021 05:23
     */
    protected function requestToGravatar($url = '')
    {
        $respond = $this->sendRequest($url);

        return json_decode($respond);
    }

    /**
     * Function init
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/08/2021 07:26
     */
    public function init()
    {
        $this->jsonLink = str_replace(self::USER_PATTERN, $this->username, self::JSON_LINK);
        try {
            $file = md5($this->jsonLink);
            if ($this->cacheStatus === true) {
                $cache = new PhpFileCache($this->cachePath, $file);
                if (!$data = $cache->get($file)) {
                    $data = $this->requestToGravatar($this->jsonLink);
                    $cache->set($file, $data, 84600);
                }
            } else {
                $data = $this->requestToGravatar($this->jsonLink);
            }
            $this->data = $data;
        } catch (Exception $exception) {
            $this->data = null;
        }
    }

    /**
     * Function showAvatar
     *
     * @param string $size
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/08/2021 08:29
     */
    public function showAvatar($size = '300')
    {
        if (!empty($this->data)) {
            return $this->data->entry[0]->thumbnailUrl . '?' . http_build_query(['site' => $size]);
        }

        return null;
    }
}
