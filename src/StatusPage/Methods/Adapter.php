<?php


namespace StatusPageAPI\Methods;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;

class Adapter
{
    /**
     * @var Client $client
     */
    private Client $client;

    private string $path;

    private string $sub_adapter_path;

    /**
     * Components constructor.
     * @param Client $client
     * @param string $path
     */
    public function __construct(Client $client, string $path, string $sub_adapter_path = '')
    {
        $this->client = $client;
        $this->path = $path;
        $this->sub_adapter_path = $sub_adapter_path;
    }

    public function __call(string $name, array $arguments)
    {
        print_r($name);
        if ($name == $this->sub_adapter_path && isset($arguments[0])){
            $id = $arguments[0];
            return new Adapter($this->client, $this->path.'/'.$id.'/'.$this->sub_adapter_path);
        }
    }

    /**
     * Returns all Objects
     * @return stdClass
     * @throws GuzzleException
     */
    public function getAll($per_page = 100, $page_id = 1){
        $response = $this->client->get($this->path, [
            'query' => [
                'page_id' => $page_id,
                'per_page' => $per_page,
            ],
        ]);
        return json_decode($response->getBody());
    }

    /**
     * Gets an Object by their ID
     * @param $id
     * @return stdClass
     * @throws GuzzleException
     */
    public function get($id){
        $response = $this->client->get($this->path.'/'.$id);
        return json_decode($response->getBody());
    }

    /**
     * Creates an Object
     * @param array $data
     * @return stdClass
     * @throws GuzzleException
     */
    public function create(array $data){
        $response = $this->client->post($this->path, [
            'json' => $data
        ]);
        return json_decode($response->getBody());
    }

    /**
     * Updates an Object by their ID
     * @param $id
     * @param array $data
     * @return stdClass
     * @throws GuzzleException
     */
    public function update($id, array $data){
        $response = $this->client->patch($this->path.'/'.$id, [
            'json' => $data,
        ]);
        return json_decode($response->getBody());
    }

    /**
     * Deletes an Object by their ID
     * @param $id
     * @return null
     * @throws GuzzleException
     */
    public function delete($id){
        $response = $this->client->delete($this->path.'/'.$id);
        return json_decode($response->getBody());
    }
}