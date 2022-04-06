<?php

namespace WeDesignIt\HotelprofessionalsApiClient;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use WeDesignIt\HotelprofessionalsApiClient\Traits\FluentCaller;

class Client {

    use FluentCaller;

    protected string $baseUrl = "192.168.178.71:8892/api/v1/";

    private GuzzleClient $client;

    public function __construct(string $secret)
    {
        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());

        $middleware = Middleware::tap(function (Request $request) {
             var_dump($request->getRequestTarget());
        });

        $stack->push($middleware);

        $this->client = new GuzzleClient([
            'base_uri' => $this->baseUrl,
            'handler' => $stack,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => "Bearer {$secret}"
            ],
            'allow_redirects' => false
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

        return json_decode($contents, true);
    }

    public function get(string $uri, array $options = []): array
    {
        return $this->request('GET', $uri, $options);
    }

    public function put(string $uri, array $options = []): array
    {
        return $this->request('PUT', $uri, $options);
    }

    public function post(string $uri, array $options = []): array
    {
        return $this->request('POST', $uri, $options);
    }

    public function delete(string $uri, array $options = []): array
    {
        return $this->request('DELETE', $uri, $options);
    }
}