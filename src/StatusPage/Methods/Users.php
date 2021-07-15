<?php


namespace StatusPageAPI\Methods;

use StatusPageAPI\Models\Users\User;

class Users
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    /**
     * General constructor.
     * @param \GuzzleHttp\Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Gets the current Authorized User
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUser(){
        $response = $this->client->get('user');
        return json_decode($response->getBody());
    }

}