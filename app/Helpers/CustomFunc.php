<?php
// namespace App\Helpers;
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
