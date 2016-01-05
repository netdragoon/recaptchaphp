<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Site Key
    |--------------------------------------------------------------------------
    | Use this in the HTML code your site serves to users.
    |
    */
    'site_key' => env('SITE_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Site Key
    |--------------------------------------------------------------------------
    | Use this for communication between your site and Google. Be sure to keep it a secret.
    |
    */
    'secret_key' => env('SECRET_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    | Paste this snippet before the closing </head> tag on your HTML template:
    |
    */
    'url_api' => env('URL_API', 'https://www.google.com/recaptcha/api.js'),

    /*
    |--------------------------------------------------------------------------
    | Verify
    |--------------------------------------------------------------------------
    | When your users submit the form where you integrated reCAPTCHA, you'll get as part of the payload a string with the name "g-recaptcha-response".
    | In order to check whether Google has verified that user, send a POST request with these parameters:
    |
    | secret    (required)	    6LckVhQTAAAAAKxlk0zg1uq2wlNZJJyRZJmSyXjp
    | response  (required)	    The value of 'g-recaptcha-response'.
    | remoteip	                The end user's ip address.
    |
    */
    'url_verify' => env('URL_VERIFY', 'https://www.google.com/recaptcha/api/siteverify')

];