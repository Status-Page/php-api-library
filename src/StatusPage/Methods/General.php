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
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPing(){
        $response = $this->client->get('ping');
        return json_decode($response->getBody());
    }

    /**
     * GET /api/v1/version
     *
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getVersion(){
        $response = $this->client->get('version');
        return json_decode($response->getBody());
    }

    /**
     * POST /api/v1/run/cron
     *
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postRunCron(){
        $response = $this->client->post('run/cron');
        return json_decode($response->getBody());
    }
}