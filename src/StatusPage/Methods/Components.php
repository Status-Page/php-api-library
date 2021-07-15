<?php


namespace StatusPageAPI\Methods;


use StatusPageAPI\Models\Components\Component;

class Components
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    /**
     * Components constructor.
     * @param \GuzzleHttp\Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getComponents(){
        $response = $this->client->get('components');
        return json_decode($response->getBody());
    }
}