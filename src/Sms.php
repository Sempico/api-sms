<?php 

namespace Sempico\Api;

class Sms 
{
    /**
	 * Api client
	 * @var ApiClient
	 */
    private $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    } 

    /**
     * Get all source prices
     * @param array $config
     * @return array
     */
    public function send(array $config)
    {
        $route = 'v1/send'.http_build_query($config);

        return $this->client->curlRequest($route, false, []);
    }

    /**
     * Refactor sms data
     * @param int $id
     * @param array $config
     * @return array
     */
    public function refactore(array $config)
    {
        $route = 'v1/replacement?'.http_build_query($config);

        return $this->client->curlRequest($route, false, []);
    }
}