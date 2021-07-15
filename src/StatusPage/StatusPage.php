<?php

namespace StatusPageAPI;

use GuzzleHttp\Client;
use StatusPageAPI\Methods\Adapter;
use StatusPageAPI\Methods\General;
use StatusPageAPI\Methods\Users;

class StatusPage
{
    /**
     * @var Client $client
     */
    private $client;

    /**
     * StatusPage constructor.
     * @param string $domain The Domain Name of the Status Page
     * @param string $api_key Your API Key
     * @param bool $secure Whether you want to use https or http as protocol. Note: $secure = true is recommended!
     */
    public function __construct($domain, $api_key, $secure = true)
    {
        $this->client = new Client([
            'base_uri' => ($secure ? 'https://' : 'http://').$domain.'/api/v1/',
            'headers' => [
                'Authorization' => 'Bearer '.$api_key,
                'Accept' => 'application/json',
                'Content-Typ' => 'application/json'
            ]
        ]);
    }

    public function general(){
        return new General($this->client);
    }

    public function users(){
        return new Users($this->client);
    }

    public function components(){
        return new Adapter($this->client, 'components');
    }

    public function componentGroups(){
        return new Adapter($this->client, 'components-groups');
    }

    public function incidents(){
        return new Adapter($this->client, 'incidents', 'updates');
    }
}