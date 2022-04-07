# Hotelprofessionals PHP API Client

## Resources
We highly encourage you to read the [API documentation](https://nieuw.hotelprofessionals.nl/api/documentation) before working with this API wrapper, the documentation will explain more about the endpoints and what is required to store a resource. 

## Requirements
PHP 7.4 or higher.

## Installation
```
compose require wedesignit/hotelprofessionals-api-client
```

## Usage
```php
use WeDesignIt\HotelprofessionalsApiClient\Client;
use WeDesignIt\HotelprofessionalsApiClient\Hotelprofessionals;

// can be obtained through HP
$apiKey = "2|xyzthisapikeywontwork";
// establish the connection
$client = Client::init($apiKey);
$hp = Hotelprofessionals::init($client);
``` 

### Countries
```php
// list all available countries
$hp->country()->list();
// get a specific country
$hp->country()->show(149);
```

### Departments
```php
// list all available Departments
$hp->department()->list();
// get a specific department
$hp->department()->show(56);
```

### Employers
```php
// list all available Employers
$hp->employer()->list();
// get a specific Employer
$hp->employer()->show(432);
```

### Experiences
```php
// list all available experiences
$hp->experience()->list();
// get a specific experiences
$hp->experience()->show(1449);
```

### JobListings
```php
// list all job listings
$hp->jobListing()->list();

// get a specific job listing
$attributes = $hp->jobListing()->show(10552);

// update a job listing
$attributes['name']['nl'] = 'New job listing name, in the nl lang';
$updatedJobListing = $hp->jobListing()->update(10552, ['job_listings' => $attributes]);

// publish a job listing
$hp->jobListing()->publish(10552);

// store a new job listing
$newJobListingAttributes = $hp->jobListing()->store($attributes);

// its also possible to delete a job listing
$hp->jobListing()->delete($newJobListingAttributes['data']['id']);
```

### Pagination
Every list method will return a paginated response, the page can be changed like so.
```php
// return page 3 of the department list.
$hp->department()->page(3)->list();
```

