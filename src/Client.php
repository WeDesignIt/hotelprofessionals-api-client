<?php

namespace WeDesignIt\HotelprofessionalsApiClient;

use GuzzleHttp\Client as GuzzleClient;

class Client {

    protected string $baseUrl = "localhost:8892/api/v1";

    protected GuzzleClient $client;

    public function __construct(string $secret)
    {
        $this->client = new GuzzleClient([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => "Bearer {$secret}"
            ],
        ]);
    }

    public static function init(string $secret): self
    {
        return (new static($secret));
    }

    public function request(string $method, string $uri, array $options = [])
    {
        $response = $this->client->request($method, $uri, $options);

        $contents = $response->getBody()->getContents();

        return  json_decode($contents, true);
    }
}