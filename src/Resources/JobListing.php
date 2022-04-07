<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Resources;

use WeDesignIt\HotelprofessionalsApiClient\Traits\ManipulateResource;
use WeDesignIt\HotelprofessionalsApiClient\Traits\ViewResource;

class JobListing extends Resource
{
    use ViewResource, ManipulateResource;

    public function publish($resource): array
    {
        return $this->client->put($this->uri($resource));
    }
}