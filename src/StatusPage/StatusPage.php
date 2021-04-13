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
     * @param string $url
     */
    public function __construct($url, $api_key)
    {
        $this->client = new Client([
            'base_uri' => $url.'/api/v1/',
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