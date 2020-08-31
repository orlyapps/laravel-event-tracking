# Simple Event Tracking for Mobile Apps

[![Latest Version on Packagist](https://img.shields.io/packagist/v/orlyapps/laravel-event-tracking.svg?style=flat-square)](https://packagist.org/packages/orlyapps/laravel-event-tracking)
[![Quality Score](https://img.shields.io/scrutinizer/g/orlyapps/laravel-event-tracking.svg?style=flat-square)](https://scrutinizer-ci.com/g/orlyapps/laravel-event-tracking)
[![Total Downloads](https://img.shields.io/packagist/dt/orlyapps/laravel-event-tracking.svg?style=flat-square)](https://packagist.org/packages/orlyapps/laravel-event-tracking)

Simple Event Tracking for Mobile Apps

## Installation

You can install the package via composer:

```bash
composer require orlyapps/laravel-event-tracking
php artisan vendor:publish --provider="Orlyapps\LaravelEventTracking\LaravelEventTrackingServiceProvider" --tag="config"
php artisan vendor:publish --provider="Orlyapps\LaravelEventTracking\LaravelEventTrackingServiceProvider" --tag="migrations"

```

```php
// User.php
class User extends Authenticatable
{
    use HasEventTracking;
}

// api.php
LaravelEventTracking::routes();
```

## Usage

```php
$user->track('first_login', ['my-meta-key' => 'my meta value'])
```

```js
fetch("http://laravel.test/api/events", {
    headers: {
        accept: "application/json, text/plain, */*",
        "accept-language": "de",
        authorization:
            "Bearer 9|mrHe15eBQkGejPtXXbZ8VB4yVczhFD8fDHmObjQgskEk7f5G1dW1LbqIBQ2MjZWP6xhhniHRpxhNaZm0",
        "content-type": "application/json",
    },
    body: '{"name":"first_login","my-meta-key":{"code":"my meta value"}}',
    method: "POST",
    mode: "cors",
});
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@orlyapps.de instead of using the issue tracker.

## Credits

-   [Orlyapps](https://github.com/orlyapps)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
