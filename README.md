# Hotelprofessionals PHP API Client

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

// Can be obtained through HP.
$apiKey = "2|xyzthisapikeywontwork";
// Establish the connection.
$client = Client::init($apiKey);
$hp = Hotelprofessionals::init($client);

// Quick check if everything is properly setup.
$hp->authenticate();
``` 

### Custom URL
In case you want to use a custom URL (e.g. to target a testing environment), you can pass the base URL for the API 
as second parameter to the client:

```php
$client = Client::init($apiKey, 'https://integratie.hotelprofessionals.nl/api/v1/')
```

> [!CAUTION]
> It is important to end the base URL with a forward slash (`/`), otherwise you may receive weird results.

### Read the docs
We highly suggest you to read the official API docs, this will give you more information on what the API expects.
This can be found at:
[https://www.hotelprofessionals.nl/api/documentation](https://www.hotelprofessionals.nl/api/documentation).

## Resources
There's lots of resources available to fetch data from Hotelprofessionals directly.

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
````

### Category
```php
// list all available categories
$hp->category()->list();
// get a specific category
$hp->category()->show(1449);
```
### Languages
```php
// list all available languages
$hp->language()->list();
// get a specific languages
$hp->language()->show(1449);
```
### Education
```php
// list all available education
$hp->education()->list();
// get a specific education
$hp->education()->show(1449);
```
### Employment types
```php
// list all available employment types
$hp->employmentType()->list();
// get a specific employment type
$hp->employmentType()->show(1449);
```
### Function features
```php
// list all available function features
$hp->functionFeature()->list();
// get a specific function feature
$hp->functionFeature()->show(1449);
```

### Occupation
```php
// list all available occupations
$hp->occupation()->list();
// get a specific occupation
$hp->occupation()->show(739);
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
Every list method will return a paginated response, the page can be changed by using the `page` method:
```php
// return page 3 of the department list.
$hp->department()->page(3)->list();
```

