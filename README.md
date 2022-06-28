# Hunter.io
A PHP wrapper for Hunter v2 API.


## Getting Started

### Install
```
composer require saintsweeto/hunterio
```


### Initialization
```
use Hiraya\Hunter;

$hunter = new Hunter();
```

### API Calls

#### Domain Search
  
The Domain Search returns all the email addresses found using one given domain name, with sources.
```
$hunter->searchDomain('hirayasolutions.co.nz');
```
You can add optional parameters by passing an array
```
$hunter->searchDomain('hirayasolutions.co.nz', ['limit' => 20, 'offset' => 1]);
```

#### Email Finder

This API Call guesses the most likely email of a person using his/her first name, last name and a domain name
```
$hunter->findEmail('hirayasolutions.co.nz', 'EJ', 'Ramos');
```

#### Email Verifier
  
This API Call checks the deliverability of a given email address, verifies if it has been found in our database, and returns their sources.
```
$hunter->verifyEmail('info@hirayasolutions.co.nz');
```

#### Email Count
  
This API Call allows you to know how many email addresses we have for one domain or for one company. It's free and doesn't require authentication.
```
$hunter->countEmail('hirayasolutions.co.nz');
```

#### Account Information
  
This API Call enables you to get information regarding your Hunter account at any time. This call is free.
```
$hunter->displayAccount();
```

#### List all your leads
  
Returns all the leads already saved in your account. The leads are returned in sorted order, with the most recent leads appearing first.
```
$hunter->listLeads();
```

#### Get a lead

Retrieves all the fields of a lead.
```
$hunter->getLead(100128);
```

#### Create a lead

Creates a new lead. The parameters must be passed as a JSON hash.
```
$hunter->createLead([
    'email' => 'info@hirayasolutions.co.nz',
    'first_name' => 'EJ',
    'last_name' => 'Ramos',
    'company' => 'Hiraya Solutions',
]);
```

#### Update a lead

Updates an existing lead. The updated values must be passed as a JSON hash.
```
$hunter->updateLead(100128, [
    'email' => 'info@hirayasolutions.co.nz',
    'first_name' => 'EJ',
    'last_name' => 'Ramos',
    'company' => 'Hiraya Solutions',
]);
```

#### Delete a lead

Deletes an existing lead.
```
$hunter->deleteLead(100128);
```

## API Reference
https://hunter.io/api/v2/docs
