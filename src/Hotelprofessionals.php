<?php

namespace WeDesignIt\HotelprofessionalsApiClient;

use WeDesignIt\HotelprofessionalsApiClient\Resources\DepartmentCategory;
use WeDesignIt\HotelprofessionalsApiClient\Resources\Country;
use WeDesignIt\HotelprofessionalsApiClient\Resources\Department;
use WeDesignIt\HotelprofessionalsApiClient\Resources\Education;
use WeDesignIt\HotelprofessionalsApiClient\Resources\Employer;
use WeDesignIt\HotelprofessionalsApiClient\Resources\EmploymentType;
use WeDesignIt\HotelprofessionalsApiClient\Resources\Experience;
use WeDesignIt\HotelprofessionalsApiClient\Resources\FunctionFeature;
use WeDesignIt\HotelprofessionalsApiClient\Resources\InternshipType;
use WeDesignIt\HotelprofessionalsApiClient\Resources\JobListing;
use WeDesignIt\HotelprofessionalsApiClient\Resources\Language;
use WeDesignIt\HotelprofessionalsApiClient\Resources\Occupation;
use WeDesignIt\HotelprofessionalsApiClient\Traits\FluentCaller;

class Hotelprofessionals
{
    use FluentCaller;

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function authenticate(): array
    {
        return $this->client->get('authenticate');
    }

    public function country(): Country
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

    public function departmentCategory(): DepartmentCategory
    {
        return new DepartmentCategory($this->client, 'department-categories');
    }

    public function education(): Education
    {
        return new Education($this->client, 'educations');
    }

    public function language(): Language
    {
        return new Language($this->client, 'languages');
    }

    public function occupation(): Occupation
    {
        return new Occupation($this->client, 'occupations');
    }

    public function employmentType(): EmploymentType
    {
        return new EmploymentType($this->client, 'employment-types');
    }

    public function functionFeature(): FunctionFeature
    {
        return new FunctionFeature($this->client, 'function-features');
    }

    public function internshipType(): InternshipType
    {
        return new InternshipType($this->client, 'internship-types');
    }
}
