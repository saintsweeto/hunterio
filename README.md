# Hunter.io
A PHP wrapper for Hunter.io v2 API

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Installation
```
composer require saintsweeto/hunterio
```

### Initialization
```
use Hiraya\Hunter;

$hunter = new Hunter(API_KEY);
```

### API Calls

#### Domain Search
  
The Domain Search returns all the email addresses found using one given domain name, with sources.
```
$hunter->searchDomain('hirayasolutions.com');
```

#### Email Finder

This API Call guesses the most likely email of a person using his/her first name, last name and a domain name
```
$hunter->findEmailByDomain('hirayasolutions.com', 'EJ', 'Ramos');
```
You can even do it with the company and full name as parameters
```
$hunter->findEmailByCompany('hirayasolutions.com', 'EJ Ramos');
```

#### Email Verifier
  
This API Call checks the deliverability of a given email address, verifies if it has been found in our database, and returns their sources.
```
$hunter->verifyEmail('info@hirayasolutions.com');
```

#### Email Count
  
This API Call allows you to know how many email addresses we have for one domain or for one company. It's free and doesn't require authentication.
```
$hunter->countEmail('hirayasolutions.com');
```

#### Account Information
  
This API Call enables you to get information regarding your Hunter account at any time. This call is free.
```
$hunter->displayAccount();
```

## API Reference
https://hunter.io/api/v2/docs
