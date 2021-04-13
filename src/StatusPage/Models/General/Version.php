<?php


namespace StatusPageAPI\Models\General;


class Version
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    /**
     * @var \StatusPageAPI\Models\General\Meta $meta
     */
    public $meta;

    /**
     * Pong constructor.
     * @param \GuzzleHttp\Client $client
     * @param $data
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

class Meta {

    /**
     * @var bool $on_latest
     */
    public $on_latest;

    /**
     * @var \StatusPageAPI\Models\General\Git $git
     */
    public $git;
}

class Git {

    /**
     * @var string $tag
     */
    public $tag;

    /**
     * @var string $last_tag
     */
    public $last_tag;
}