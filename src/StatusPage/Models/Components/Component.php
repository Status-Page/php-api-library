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
    protected $group;
    public $group_id;
    public $visibility;
    protected $status;
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

    public function save(){
        $this->client->patch('components/'.$this->id, [
            'body' => json_encode(get_object_vars($this))
        ]);
    }

    /**
     * @return string Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(){
        return json_decode($this->client->delete('components/'.$this->id)->getBody());
    }
}