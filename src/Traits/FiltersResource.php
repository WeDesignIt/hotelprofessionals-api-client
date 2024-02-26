<?php

namespace WeDesignIt\HotelprofessionalsApiClient\Traits;

use WeDesignIt\HotelprofessionalsApiClient\Exceptions\StructureException;

trait FiltersResource
{
    private array $supportedDelimiters = [
        '=', '!=', '<', '<=', '>', '>=', 'LIKE',
    ];

    protected array $filters = [];

    public function filter(array $filters): self
    {
        $this->filters = $this->validateFilters($filters);
        return $this;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * Ensure the given filters are a valid structure.
     *
     * @param array $filters
     * @return array
     * @throws StructureException
     */
    private function validateFilters(array $filters): array
    {
        foreach ($filters as $i => $filter) {
            if (! is_array($filter)) {
                throw new StructureException('Filter is of a not supported structure (not an array).');
            }

            if (! array_key_exists('delimiter', $filter)) {
                $filter['delimiter'] = '=';
            } elseif (! in_array($filter['delimiter'], $this->supportedDelimiters)) {
                throw new StructureException('Unsupported delimiter.');
            }

            if (! array_key_exists('column', $filter) || ! array_key_exists('value', $filter)) {
                throw new StructureException('Filter is missing column and/or value key!');
            }

            // Only allow supported columns.
            $filters[$i] = array_intersect_key($filter, array_flip(['column', 'delimiter', 'value']));
        }

        return array_values($filters);
    }
}
