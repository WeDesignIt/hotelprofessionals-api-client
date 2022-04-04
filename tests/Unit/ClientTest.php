<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Tests;

use PHPUnit\Framework\TestCase;
use WeDesignIt\HotelprofessionalsApiClient\Client;

class ClientTest extends TestCase
{

    public function test_request_get_method()
    {
        // local token for development, so no this aint compromised data.
        $testToken = "1|zQOYIq01m2A7u6iFEe5mFW7yNCEfATx0L3MkIRN2";

        $resp = Client::init($testToken)->request('GET', 'authenticate');
        dd($resp);
    }
}