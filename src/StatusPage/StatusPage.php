<?php

namespace StatusPageAPI;

use GuzzleHttp\Client;
use StatusPageAPI\Methods\General;

class StatusPage
{
    /**
     * @var Client $client
     */
    private $client;

    /**
     * StatusPage constructor.
     * @param string $domain The Domain Name of the Status Page
     * @param string $api_key Your API Key
     * @param bool $secure Whether you want to use https or http as protocol. Note: $secure = true is recommended!
     */
    public function __construct($domain, $api_key, $secure = true)
    {
        $this->client = new Client([
            'base_uri' => ($secure ? 'https://' : 'http://').$domain.'/api/v1/',
            'headers' => [
                'Authorization' => 'Bearer '.$api_key,
                'Accept' => 'application/json'
            ]
        ]);
    }

    public function general(){
        return new General($this->client);
    }
}