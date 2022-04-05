<?php

namespace WeDesignIt\HotelprofessionalsApiClient;

use WeDesignIt\HotelprofessionalsApiClient\Resources\Country;
use WeDesignIt\HotelprofessionalsApiClient\Traits\FluentCaller;

class Hotelprofessionals
{
    use FluentCaller;

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function countries(): Country
    {
        return new Country($this->client, 'countries');
    }
}