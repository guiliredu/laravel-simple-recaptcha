<?php

namespace Guiliredu\LaravelSimpleRecaptcha;

use GuzzleHttp\Client;

class Recaptcha
{
    public static function isRequestValid($request)
    {
        $response = static::validateRequest($request);

        return (boolean) $response['success'];
    }

    public static function validateRequest($request)
    {
        return static::validate($request->input('g-recaptcha-response'));
    }

    public static function isValid($input)
    {
        $response = static::validate($input);

        return (boolean) $response['success'];
    }

    public static function validate($input)
    {
        // Guzzle
        $http = new Client();

        $response = $http->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => config('recaptcha.secret'),
                'response' => $input,
                'remoteip' => request()->header('REMOTE_ADDR'),
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
