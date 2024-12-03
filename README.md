# Laravel Twinfield

Twinfield service provider for Laravel 8, adding the functionality of the [`php-twinfield/twinfield`](https://github.com/php-twinfield/twinfield) API client.

## Warning: this project is archived

This means that there will be no more updates or security fixes from Dependabot.

## Requirements

This service provider is written for Laravel 8 and up and requires PHP 8.1 to run.

## Installation

You can install this package with composer:

```
composer require "willemo/laravel-twinfield:^2.0"
```

The package will be automatically discovered by your Laravel installation, so you don't need to add the service provider and facade to your app config file.

## Need support for lower PHP or Laravel versions?

In that case you can install the `^1.0` version of this package, which is compatible with Laravel 5.5+ and PHP 7.2+.

## Upgrading from version 0 to version 1

Between version 0.X.X and 1.X.X the file structure has been modified. Make sure all class references are correct after upgrading.

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

If you wish to use the `autoRedirect` option of the PhpTwinfield API client, you can enable it in the `config/twinfield.php` file by setting `'autoRedirect' => true,`.

## Usage

You can use the `Twinfield` facade to get an API connector:

```php
$customerApiConnector = \Twinfield::get('Customer');
```

For usage of the API connectors and available connectors, [check the PhpTwinfield docs](https://github.com/php-twinfield/twinfield).
