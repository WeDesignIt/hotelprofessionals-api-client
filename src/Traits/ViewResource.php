<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Traits;

trait ViewResource
{
    public function list(): array
    {
        return $this->client->get($this->uri(), ['query' => $this->getQuery()]);
    }

    public function show(int $resource): array
    {
        return $this->client->get($this->uri($resource));
    }
}
