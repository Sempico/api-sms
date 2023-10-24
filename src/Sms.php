<?php 

namespace Sempico\Api;

class Sms 
{
    /**
     * Get all source prices
     * @param array $config
     * @return array
     */
    public static function send(array $config)
    {
        $route = 'v1/send'.http_build_query($config);

        $client = new ApiClient();

        return $client->curlRequest($route, false, []);
    }

    /**
     * Refactor sms data
     * @param int $id
     * @param array $config
     * @return array
     */
    public static function refactore(array $config)
    {
        $route = 'v1/replacement?'.http_build_query($config);

        $client = new ApiClient();

        return $client->curlRequest($route, false, []);
    }
}