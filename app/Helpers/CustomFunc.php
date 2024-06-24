<?php
// namespace App\Helpers;

use Illuminate\Support\Arr;

if (!function_exists('isEmail')) {
    function isEmail($email)
    {
        $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        // return filter_var($email, FILTER_VALIDATE_EMAIL) !== false ? true : false;
        return preg_match($pattern, $email) == 1;
    }


}
if (!function_exists('getCurrentUser')) {
    function getCurrentUser()
    {
       return auth()->user();
    }
}
if (!function_exists('array_get')) {
    function array_get($array, $key, $default = null)
    {
        return Arr::get($array, $key, $default);
    }
}

if (!function_exists('removeNullOrEmptyString')) {
    function removeNullOrEmptyString(array $input)
    {
        return array_filter($input, function ($v) {
            return $v !== null && $v !== '';
        }, ARRAY_FILTER_USE_BOTH);
    }
}
