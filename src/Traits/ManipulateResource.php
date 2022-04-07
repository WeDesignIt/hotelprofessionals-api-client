<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Traits;

trait ManipulateResource {

    public function update(int $resource, array $attributes): array
    {
        return $this->client->put($this->uri($resource), ['form_params' => $attributes]);
    }

    public function delete(int $resource): array
    {
        return $this->client->put($this->uri($resource));
    }

    public function store(array $attributes): array
    {
        return $this->client->post($this->uri(), ['form_params' => $attributes]);
    }
}