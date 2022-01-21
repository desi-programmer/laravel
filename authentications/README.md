# Sanctum Auth For APIs

    NOTE : Follow Database Setup from Previous tutorial.

## `Auth Controller`

Will add an authcontroller to handle Auth routes such as register, login etc.

```sh
php artisan make:controller AuthController
```

### `Updating User Model`

Also to make changes to the table go to the specific migration and add the fields.

Will go to app/models/User.php and add our acceptable fields to the modal.

    NOTE : Make sure to apply the boolean cast.
    
```php
'active' => 'boolean'
```

Apply Migration

```sh
php artisan migrate
```

## using `laravel-otp` for generating OTP


```sh
composer require seshac/otp-generator
```

Publish and run migrations

```php
php artisan vendor:publish --provider="Seshac\Otp\OtpServiceProvider" --tag="migrations"
php artisan migrate
```

Publish config file

```php
php artisan vendor:publish --provider="Seshac\Otp\OtpServiceProvider" --tag="config"
```

[otp-generator Github](https://github.com/seshac/otp-generator)

