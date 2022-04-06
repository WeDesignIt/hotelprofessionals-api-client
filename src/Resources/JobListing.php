<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Resources;

use WeDesignIt\HotelprofessionalsApiClient\Traits\DefaultCrud;

class JobListing extends Resource
{
    use DefaultCrud;

    public function publish($resource)
    {
        return $this->client->put($this->uri($resource));
    }
}