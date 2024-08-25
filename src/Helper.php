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
     * @param  string  $url
     * @param  array  $params
     * @param  int  $timeout
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/08/2021 49:24
     */
    protected function sendRequest($url = '', $params = array(), $timeout = 30)
    {
        $endpoint = $url . '?' . http_build_query($params);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Safari/605.1.15'
            ),
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}
