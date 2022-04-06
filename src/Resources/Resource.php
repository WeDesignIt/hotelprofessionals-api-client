<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Resources;

use WeDesignIt\HotelprofessionalsApiClient\Client;

abstract class Resource
{
    /** @var Client $client */
    protected Client $client;

    protected int $page = 1;

    protected int $perPage = 15;

    protected string $uri;

    public function __construct(Client $client, string $uri)
    {
        $this->client = $client;
        $this->uri = $uri;
    }

    public function uri(string $params = ''): string
    {
        return implode('/', [$this->uri, $params]);
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;

        return $this;
    }

    protected function getQuery(): array
    {
        $query['page'] = $this->getPage();
        $query['per_page'] = $this->getPerPage();

        return $query;
    }
}