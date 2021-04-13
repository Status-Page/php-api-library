<?php

namespace StatusPageAPI\Methods;

use GuzzleHttp\Client;
use StatusPageAPI\Models\General\Pong;

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
     * @return Pong
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPing(){
        $response = $this->client->get('ping');
        return json_decode($response->getBody());
    }
}