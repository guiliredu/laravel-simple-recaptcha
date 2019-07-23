<?php

namespace Guiliredu\LaravelSimpleRecaptcha;

use Guiliredu\LaravelSimpleRecaptcha\Recaptcha;

class RecaptchaValidator
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        return Recaptcha::isValid($value);
    }
}
