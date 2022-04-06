<?php

namespace WeDesignIt\HotelprofessionalsApiClient;

use WeDesignIt\HotelprofessionalsApiClient\Resources\Country;
use WeDesignIt\HotelprofessionalsApiClient\Resources\Department;
use WeDesignIt\HotelprofessionalsApiClient\Resources\Employer;
use WeDesignIt\HotelprofessionalsApiClient\Resources\Experience;
use WeDesignIt\HotelprofessionalsApiClient\Resources\JobListing;
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

    public function department(): Department
    {
        return new Department($this->client, 'departments');
    }

    public function experience(): Experience
    {
        return new Experience($this->client, 'experiences');
    }

    public function employer(): Employer
    {
        return new Employer($this->client, 'employers');
    }

    public function jobListing(): JobListing
    {
        return new JobListing($this->client, 'job-listings');
    }

}