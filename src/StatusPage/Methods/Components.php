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
        /**
         * @var Component[] $toReturn
         */
        $toReturn = [];

        $response = $this->client->get('components');
        $data = json_decode($response->getBody());

        foreach ($data as $c){
            $toReturn[] = new Component($this->client, $c);
        }

        return $toReturn;
    }
}