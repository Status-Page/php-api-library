<?php

namespace StatusPageAPI\Methods;

use GuzzleHttp\Client;
use Karriere\JsonDecoder\JsonDecoder;
use StatusPageAPI\Models\General\PongModel;

class General
{
    /**
     * @var Client $client
     */
    private $client;

    private $decoder;

    /**
     * General constructor.
     * @param Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;

        $this->decoder = new JsonDecoder();
    }

    /**
     * GET /api/v1/ping
     *
     * @return PongModel
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Karriere\JsonDecoder\Exceptions\InvalidBindingException
     * @throws \Karriere\JsonDecoder\Exceptions\InvalidJsonException
     * @throws \Karriere\JsonDecoder\Exceptions\JsonValueException
     * @throws \Karriere\JsonDecoder\Exceptions\NotExistingRootException
     */
    public function getPing(){
        $response = $this->client->get('ping');
        return $this->decoder->decode($response->getBody(), PongModel::class, "data");
    }
}