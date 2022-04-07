<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use WeDesignIt\HotelprofessionalsApiClient\Client as HPClient;

class ClientTest extends TestCase
{
    public function test_request_method_gets()
    {
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, ['Context-Type' => 'application/json'], json_encode([])),
            new Response(401, ['Content-Type' => 'application/json'], json_encode(['message' => 'Unauthenticated']))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientMock = $this
            ->getMockBuilder(HPClient::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['client'])
            ->getMock();

        $clientMock->method('client')->willReturn($client);

        // assert OK
        $this->assertSame([], $clientMock->request('GET', '/'));

        // second request should result in a unauth.
        $this->expectException(RequestException::class);
        $clientMock->request('GET', '/');
    }

    public function test_get_method_returns_array()
    {
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, ['Context-Type' => 'application/json'], json_encode(['data' => [['id' => 16], ['id' => 12]]])),
            new Response(401, ['Content-Type' => 'application/json'], json_encode(['message' => 'Unauthenticated']))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientMock = $this
            ->getMockBuilder(HPClient::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['client'])
            ->getMock();

        $clientMock->method('client')->willReturn($client);

        // assert OK
        $this->assertSame(['data' => [['id' => 16], ['id' => 12]]], $clientMock->get('/'));

        // second request should result in a unauth.
        $this->expectException(RequestException::class);
        $clientMock->get('/');
    }
}