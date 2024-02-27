<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Resources;

use WeDesignIt\HotelprofessionalsApiClient\Traits\FiltersResource;
use WeDesignIt\HotelprofessionalsApiClient\Traits\ManipulateResource;
use WeDesignIt\HotelprofessionalsApiClient\Traits\ViewResource;

class JobListing extends Resource
{
    use ViewResource,
        FiltersResource,
        ManipulateResource;

    public function publish(int $resource): array
    {
        return $this->client->put($this->uri($resource) . '/set-published');
    }
}
