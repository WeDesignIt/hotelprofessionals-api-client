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

### Department categories
```php
// list all available department categories
$hp->departmentCategory()->list();
// get a specific department category
$hp->departmentCategory()->show(1449);
```

### Departments
```php
// list all available Departments
$hp->department()->list();
// get a specific department
$hp->department()->show(56);
```

### Occupation
```php
// list all available occupations
$hp->occupation()->list();
// get a specific occupation
$hp->occupation()->show(739);
```

### Experiences
```php
// list all available experiences
$hp->experience()->list();
// get a specific experiences
$hp->experience()->show(1449);
````

### Languages
```php
// list all available languages
$hp->language()->list();
// get a specific languages
$hp->language()->show(1449);
```
### Educations
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

### Countries
```php
// list all available countries
$hp->country()->list();
// get a specific country
$hp->country()->show(149);
```

### Employers
Note: only a parent account (which can have sub accounts) can access this endpoint. This endpoint lists all sub 
accounts for the employer associated with the used API key.

```php
// list all available Employers
$hp->employer()->list();
// get a specific Employer
$hp->employer()->show(432);
```

### JobListings
```php
// list all job listings (including for sub account(s) if current account is a parent)
$hp->jobListing()->list();

// get a specific job listing
$attributes = $hp->jobListing()->show(10552);

// update a job listing
$attributes['title']['en'] = 'New job listing title, in the English locale';
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

### Filtering
Some endpoints support filtering. Be sure to read the documentation to know which endpoints support which filters.
The documentation will also state which column(s) and which delimiter(s) are supported. Note that if a delimiter 
isn't supported, the default will be used.

The structure for filters is as follows:

```php
// Main array holds sub-arrays:
$filters = [
    [
        // The column to filter on. Required.
        'column' => $columnToFilter, 
        // The value to apply. Required.
        'value' => $valueToFilter,
        // The delimiter for filtering. Optional, defaults to '='.
        'delimiter' => '=',  
    ],
];
 ```

Filters can be applied like so:

```php
$filters = [
    [
        'column' => 'status',
        'value' => 'published',
        'delimiter' => '=',
    ],
];

$hp->jobListing()->filter($filters)->list();
```

Note that duplicate filters _will_ be processed and might caught unexpected results.
