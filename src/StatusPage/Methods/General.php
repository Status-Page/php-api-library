<?php

namespace StatusPageAPI\Methods;

use GuzzleHttp\Client;

class General
{
    /**
     * @var Client $client
     */
    private $client;

    /**
     * General constructor.
     * @param Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * GET /api/v1/ping
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPing(){
        return $this->client->get('ping');
    }
}