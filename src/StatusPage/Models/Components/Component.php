<?php


namespace StatusPageAPI\Models\Components;


class Component
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    public $id;
    public $name;
    public $link;
    public $description;
    public $group;
    public $group_id;
    public $visibility;
    public $status;
    public $status_id;
    public $order;
    public $user;
    public $created_at;
    public $updated_at;

    /**
     * Component constructor.
     * @param \GuzzleHttp\Client $client
     * @param $data
     */
    public function __construct($client, $data)
    {
        $this->client = $client;

        foreach ($data as $key => $value){
            $this->$key = $value;
        }
    }
}