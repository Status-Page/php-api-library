<?php


namespace StatusPageAPI\Models\General;


class Version
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    /**
     * @var string $data
     */
    public $data;

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

        $this->data = $data->data;
        $this->meta = new Meta($data->meta);
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

    /**
     * Pong constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->on_latest = $data->on_latest;
        $this->git = $data->git;
    }
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

    /**
     * Pong constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->tag = $data->tag;
        $this->last_tag = $data->last_tag;
    }
}