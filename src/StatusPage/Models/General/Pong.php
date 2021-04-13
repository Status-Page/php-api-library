<?php


namespace StatusPageAPI\Models\General;


class Pong
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    public $message;

    /**
     * Pong constructor.
     * @param \GuzzleHttp\Client $client
     */
    public function __construct($client, $data)
    {
        $this->client = $client;

        if(isset($data->data)){
            $data = $data->data;
        }

        $this->message = $data->message;
    }
}