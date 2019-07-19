<?php

namespace Guiliredu\LaravelSimpleRecaptcha;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Guiliredu\LaravelSimpleRecaptcha\Skeleton\SkeletonClass
 */
class LaravelSimpleRecaptchaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-simple-recaptcha';
    }
}
