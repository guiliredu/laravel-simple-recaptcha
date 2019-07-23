# Simple Google reCAPTCHA v2 validation and blade directive

[![Latest Version on Packagist](https://img.shields.io/packagist/v/guiliredu/laravel-simple-recaptcha.svg?style=flat-square)](https://packagist.org/packages/guiliredu/laravel-simple-recaptcha)
[![Build Status](https://img.shields.io/travis/guiliredu/laravel-simple-recaptcha/master.svg?style=flat-square)](https://travis-ci.org/guiliredu/laravel-simple-recaptcha)
[![Quality Score](https://img.shields.io/scrutinizer/g/guiliredu/laravel-simple-recaptcha.svg?style=flat-square)](https://scrutinizer-ci.com/g/guiliredu/laravel-simple-recaptcha)
[![Total Downloads](https://img.shields.io/packagist/dt/guiliredu/laravel-simple-recaptcha.svg?style=flat-square)](https://packagist.org/packages/guiliredu/laravel-simple-recaptcha)

This package provides a simple reCAPTCHA v2 validation and blade directive to be user with Laravel applications.

Learn more about reCAPTCHA: https://developers.google.com/recaptcha/intro

## Installation

You can install the package via composer:

```bash
composer require guiliredu/laravel-simple-recaptcha
```

## Usage

### Configuration

After intalling the package, publish the config file with the command:

```bash
php artisan vendor:publish --provider=Guiliredu\LaravelSimpleRecaptcha\RecaptchaServiceProvider
```

This will place an recaptcha.php file in the config folder. You can now configure your .env file with the recaptcha parameters:

``` bash
RECAPTCHA_KEY=...
RECAPTCHA_SECRET=...
```

### Blade input and button

You can use the blade files to include and render the recaptcha on your form. As today, this package has 2 ways to render the recaptcha:

**Checkbox**

This will render the classic "im not a robot" checkbox to the user to click.

```php
@include('recaptcha::input')
```

You can pass and array of options as a second parameter to the include directive:

```php
@include('recaptcha::input', ['size' => 'normal', 'theme' => 'light', 'tabindex' => 0, 'callback' => 'callback'])
```

**Button**

This will render a button with an invisible reCAPTCHA check - You will need to use a callback js function to submit the form.

```php
@include('recaptcha::button', ['callback' => 'jsFunctionToCall'])
```

### Backend validation

To validate the reCAPTCHA you can use our custom request rule:

```php
class StoreController extends Controller 
{
    public function store(Request $request)
    {
        $this->validate($request,
            ['g-recaptcha-response' => 'recaptcha'],
            ['recaptcha' => trans('recaptcha::validation.invalid')]
        );
    }
}
```

We provide some helper methods to run simple validations:

```php
use Guiliredu\LaravelSimpleRecaptcha\Recaptcha;
...

dd(Recaptcha::isRequestValid($request)); // true|false
dd(Recaptcha::isValid($request->input('g-recaptcha-response'))); // true|false
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please open an issue in this repo issue tracker.

## Credits

- [Guilherme Redu](https://github.com/guiliredu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
