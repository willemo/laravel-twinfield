# Laravel Twinfield

Twinfield service provider for Laravel 5.5+.

## Requirements

This service provider is written for Laravel 5.5 and up and requires PHP 7.1 to run.

It works with the latest `dev-master` code from [`php-twinfield/twinfield`](https://github.com/php-twinfield/twinfield), until they release the current code with a stable version number.

## Installation

You can install this package with composer:

```
composer require willemo/laravel-twinfield
```

The package will be automatically discovered by your Laravel installation, so you don't need to add the service provider and facade to your app config file.

## Configuration

Firstly you'll have to publish the config file:

```
php artisan vendor:publish --provider="Willemo\LaravelTwinfield\TwinfieldServiceProvider"
```

Then you can configure the Twinfield API client in `config/twinfield.php`. The best way to configure your Twinfield API is by using environment variables.

### Connect to the API with your credentials

You can either choose to use your credentials to connect to the Twinfield API:

```dotenv
TWINFIELD_AUTH_TYPE=credentials
TWINFIELD_USERNAME=your_username
TWINFIELD_PASSWORD=your_password
TWINFIELD_ORGANISATION=your_organisation
TWINFIELD_OFFICE=your_office
```

### Connect to the API using OAuth

Or you can use OAuth to connect to the Twinfield API:

```dotenv
TWINFIELD_CLIENT_ID=your_client_id
TWINFIELD_CLIENT_SECRET=your_client_secret
TWINFIELD_RETURN_URL=https://example.org/oauth/return/url
TWINFIELD_ORGANISATION=your_organisation
TWINFIELD_OFFICE=your_office
```

## Usage

You can use the `Twinfield` facade to get an API connector:

```php
$customerApiConnector = \Twinfield::get('Customer');
```

For usage of the API connectors and available connectors, [check the PhpTwinfield docs](https://github.com/php-twinfield/twinfield).
