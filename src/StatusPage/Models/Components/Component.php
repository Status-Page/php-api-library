<?php


namespace StatusPageAPI\Models\Components;


class Component
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    protected $id;
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
    protected $created_at;
    protected $updated_at;

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
        $data = (object) array_filter((array) $this, function ($val) {
            return !is_null($val);
        });

        $this->client->patch('components/'.$this->id, [
            'body' => json_encode($data)
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