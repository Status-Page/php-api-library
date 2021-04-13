<?php

namespace StatusPageAPI\Models\Users;

class User
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    public $id;
    public $name;
    public $email;
    public $deactivated;
    public $email_verified_at;
    public $current_team_id;
    public $profile_photo_path;
    public $profile_photo_url;
    public $created_at;
    public $updated_at;

    /**
     * User constructor.
     * @param \GuzzleHttp\Client $client
     * @param $data
     */
    public function __construct($client, $data)
    {
        $this->client = $client;

        if(isset($data->data)){
            $data = $data->data;
        }

        foreach ($data as $key => $value){
            if(property_exists($this, $this->$key))
                $this->$key = $value;
        }
    }
}