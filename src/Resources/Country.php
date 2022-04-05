<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Resources;


class Country extends Resource {

    public function list(): array
    {
        return $this->client->get($this->uri(), ['query' => $this->getQuery()]);
    }

    public function show(int $country): array
    {
        return $this->client->get($this->uri($country));
    }
}