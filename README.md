# Rumahdewi

## Requirements ##
* [PHP 7.0.0 or higher](http://www.php.net/)

## Installation ##
Install this libary through  [composer](https://getcomposer.org).

    composer require pmb/rumahdewi

## Usage ##
#### Basic Example ####

```php
<?php
use rumahdewi\Rumahdewi_Client;

$client = new Rumahdewi_Client('ClientId');
$token = $client->getToken(); //this action will give you an token
```

#### Get Agency Info ####

```php
$client->getAgencyInfo($token);
```

#### Add Access User ####

```php
$client->addUser($token, $params);
```

#### Add Listing ####

```php
$client->addListing($token, $params);
```

## Website ##
Visit our official website [Rumahdewi.com](https://www.rumahdewi.com/)
