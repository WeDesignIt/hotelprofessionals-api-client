# Hotelprofessionals PHP API Client

### Requirements
PHP 7.4 or higher.

## Installation
`compose require wedesignit/hotelprofessionals-api-client`

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

## Resources
All endpoints are defined by resources, all available endpoints can be found at the official [API documentation](https://nieuw.hotelprofessionals.nl/api/documentation)

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

$attributes['name']['nl'] = 'New job listing name, in the nl lang';
// update a job listing
$updatedJobListing = $hp->jobListing()->update(10552, ['job_listings' => $attributes]);
// publish a job listing
$hp->jobListing()->publish(10552);
```

