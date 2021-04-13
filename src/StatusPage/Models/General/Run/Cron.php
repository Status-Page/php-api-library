<?php


namespace StatusPageAPI\Models\General\Run;


use GuzzleHttp\Client;

class Cron
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    /**
     * @var string $message
     */
    public $message;

    /**
     * Pong constructor.
     * @param \GuzzleHttp\Client $client
     * @param $data
     */
    public function __construct(Client $client, $data)
    {
        $this->client = $client;

        if(isset($data->data)){
            $data = $data->data;
        }

        $this->message = $data->message;
    }
}