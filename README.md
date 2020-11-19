# identifydigital\laravel-contacts

A laravel plugin that allows you to quickly add and work with addresses throughout your laravel application.

## Installation

Install the package through composer:
> composer require identifydigital/contacts

Run Database Migrations:
> php artisan migrate

## Service Provider

> IdentifyDigital\Contacts\ContactsServiceProvider

## Models

### Address

> IdentifyDigital\AddressBook\Models\Address
> IdentifyDigital\AddressBook\Models\Contact
> IdentifyDigital\AddressBook\Models\Country


## Traits

### Contactable

```php
use IdentifyDigital\Contacts\Traits\Contactable;

class MyModel extends Model {
   
   use Contactable;
   
   ...
   
}
```
countrys() gets all contactable methods to the corresponding model.

addContactMethod() adds a contactable method to the corresponding model.

getContactMethods(String $type = null, String $label = null, Bool $phonesOnly = null)

getAllEmails() gets all email methods to the corresponding model.

getAllWorkPhones() gets all work phone methods to the corresponding model.

getAllMobiles() gets all mobile phone methods to the corresponding model.

getAllLandlines() gets all landline phone methods to the corresponding model.

### HasAddresses

```php
use IdentifyDigital\Contacts\Traits\HasAddresses;

class MyModel extends Model {
   
   use HasAddresses;
   
   ...
   
}
```

addresses() gets all addresses to the corresponding model.

addAddress(String $line1, String $line2, String $line3, String $city, String $county, String $postcode, String $country, String $longitude = null, String $latitude = null)

getOldestAddress() gets oldest address to the corresponding model.

getLatestAddress() gets latest address to the corresponding model.

## Database Tables

### Contacts (contacts)

column | type | description | nullable
--- | --- | --- | ---
id | unsigned int | Auto-incrementing ID | No
created_at | timestamp | Time the address was crated | No
updated_at | timestamp | Time the address was last touched | Yes
deleted_at | timestamp | Time the address was deleted from Laravel | Yes
type | 	enum('mobile', 'landline', 'email') | Type of a contact method | No
label | enum('home', 'work', 'mobile') | Label of a contact method | No
value | varchar(255) | The third line of the address | No
relation_type | text | The system entity that this address is hooked up to (E.G. \Auth\User) | No
relation_id | unsigned_ int | The ID of the entiry this is address is hooked up to | No

### Addresses (addresses)

column | type | description | nullable
--- | --- | --- | ---
id | unsigned int | Auto-incrementing ID | No
created_at | timestamp | Time the address was crated | No
updated_at | timestamp | Time the address was last touched | Yes
deleted_at | timestamp | Time the address was deleted from Laravel | Yes
line_1 | varchar(100) | The first line of the address | No
line_2 | varchar(100) | The second line of the address | Yes
line_3 | varchar(100) | The third line of the address | Yes
city | varchar(50) | The city/town the address is located | No
county | varchar(100) | The county the address is located | No
postcode | varchar(32) | The postcode the address is located | No
country_id | int | The country the address is located, FK to the countries table | No
longitude | varchar(15) | The longitude of this address | Yes
latitude | varchar(15) | The latitude of this address | Yes
relation_type | text | The system entity that this address is hooked up to (E.G. \Auth\User) | No
relation_id | unsigned_ int | The ID of the entiry this is address is hooked up to | No

### Countries (countries)

column | type | description | nullable
--- | --- | --- | ---
id | unsigned int | Auto-incrementing ID | No
created_at | timestamp | Time the address was crated | No
updated_at | timestamp | Time the address was last touched | Yes
deleted_at | timestamp | Time the address was deleted from Laravel | Yes
name | varchar(255) | Name of the Country | No
region | varchar(5) | Shorthand of the Country | No


