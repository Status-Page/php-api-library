<?php

namespace StatusPageAPI\Methods;

use GuzzleHttp\Client;
use StatusPageAPI\Models\General\Pong;
use StatusPageAPI\Models\General\Run\Cron;
use StatusPageAPI\Models\General\Version;

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
        return new Pong($this->client, json_decode($response->getBody()));
    }

    /**
     * GET /api/v1/version
     *
     * @return \StatusPageAPI\Models\General\Version
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getVersion(){
        $response = $this->client->get('version');
        return new Version($this->client, json_decode($response->getBody()));
    }

    /**
     * POST /api/v1/run/cron
     *
     * @return \StatusPageAPI\Models\General\Run\Cron
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postRunCron(){
        $response = $this->client->post('run/cron');
        return new Cron($this->client, json_decode($response->getBody()));
    }
}