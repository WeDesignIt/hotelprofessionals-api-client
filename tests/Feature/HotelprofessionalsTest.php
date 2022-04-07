<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Tests\Feature;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use WeDesignIt\HotelprofessionalsApiClient\Client as HPClient;
use WeDesignIt\HotelprofessionalsApiClient\Hotelprofessionals;

class HotelprofessionalsTest extends TestCase
{
    public function test_that_list_returns_array_of_resource()
    {
        $mockResponseData = [
            "data" => [
                [
                    "id" => 16,
                    "iso_code2" => "BS",
                    "name" => [
                        "en" => "Bahamas",
                        "nl" => "Bahamas",
                    ],
                ],
                [
                    "id" => 17,
                    "iso_code2" => "BH",
                    "name" => [
                        "en" => "Bahrain",
                        "nl" => "Bahrain",
                    ],
                ],
            ]
        ];
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, ['Context-Type' => 'application/json'], json_encode($mockResponseData)),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientMock = $this
            ->getMockBuilder(HPClient::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['client'])
            ->getMock();

        $clientMock->method('client')->willReturn($client);

        $countriesList = Hotelprofessionals::init($clientMock)->country()->list();

        $this->assertSame($mockResponseData, $countriesList);

    }
}