<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Tests;

use PHPUnit\Framework\TestCase;
use WeDesignIt\HotelprofessionalsApiClient\Client;

class ClientTest extends TestCase
{
    public function test_the_test_method()
    {
        $this->assertSame("bier", (new Client())->test());
    }
}