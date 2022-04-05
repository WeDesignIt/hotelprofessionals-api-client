<?php

namespace WeDesignIt\HotelprofessionalsApiClient;

use GuzzleHttp\Client as GuzzleClient;
use WeDesignIt\HotelprofessionalsApiClient\Traits\FluentCaller;

class Client {

    use FluentCaller;

    protected string $baseUrl = "192.168.178.71:8892/api/v1";

    private GuzzleClient $client;

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

    public function client(): GuzzleClient
    {
        return $this->client;
    }

    public function request(string $method, string $uri, array $options = []): array
    {
        $response = $this->client()->request($method, $uri, $options);

        $contents = $response->getBody()->getContents();

        dd($contents);

        return json_decode($contents, true);
    }

    public function get(string $uri, array $options = []): array
    {
        return $this->request('GET', $uri, $options);
    }
}