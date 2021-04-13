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

    public function getUser(){
        $response = $this->client->get('user');
        return new User($this->client, json_decode($response->getBody()));
    }

}