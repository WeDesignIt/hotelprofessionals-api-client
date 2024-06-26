<?php

namespace WeDesignIt\HotelprofessionalsApiClient;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use WeDesignIt\HotelprofessionalsApiClient\Traits\FluentCaller;

class Client
{
    use FluentCaller;

    protected string $baseUrl = "https://hotelprofessionals.nl/api/v1/";

    private GuzzleClient $client;

    public function __construct(string $secret, string $baseUrl = '', array $properties = [])
    {
        $auth = "Bearer {$secret}";
        if (! empty($properties['basicAuth'])) {
            $auth = "Basic {$properties['basicAuth']}={$auth}";
        }

        if (empty($baseUrl)) {
            $baseUrl = $this->baseUrl;
        }

        $config = [
            'base_uri' => $baseUrl,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $auth,
            ],
            'allow_redirects' => false
        ];

        if (($properties['debugMode'] ?? false)) {
            $stack = new HandlerStack();
            $stack->setHandler(new CurlHandler());
            $middleware = Middleware::tap(function (Request $request) {
                 var_dump(urldecode($request->getRequestTarget()));
            });
            $stack->push($middleware);
            $config['handler'] = $stack;
        }

        $this->client = new GuzzleClient($config);
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
