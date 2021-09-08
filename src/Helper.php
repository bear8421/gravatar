<?php
/**
 * Project my-gravatar
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/08/2021
 * Time: 10:48
 */

namespace Bear8421\Helper\Gravatar;

/**
 * Trait Helper
 *
 * @package   Bear8421\Helper\Gravatar
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
trait Helper
{
    /**
     * Function sendRequest
     *
     * @param string $url
     * @param array  $params
     * @param int    $timeout
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/08/2021 49:24
     */
    protected function sendRequest($url = '', $params = array(), $timeout = 30)
    {
        $endpoint = $url . '?' . http_build_query($params);
        $curl     = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => $timeout,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSLVERSION     => CURL_SSLVERSION_TLSv1_2,
            CURLOPT_CUSTOMREQUEST  => "POST",
        ));
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }
}
