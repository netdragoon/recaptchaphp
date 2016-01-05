### CANDUCCI RECAPTCHA

[![CANDUCCI RECAPTCHA](http://i1194.photobucket.com/albums/aa377/netdragoon1/captcha_zpsxfi4kpgn.png)](https://packagist.org/packages/canducci/recaptcha)

[![Build Status](https://travis-ci.org/netdragoon/recaptchaphp.svg?branch=master)](https://travis-ci.org/netdragoon/recaptchaphp)
[![Packagist](https://img.shields.io/packagist/dt/canducci/recaptcha.svg?style=flat)](https://packagist.org/packages/canducci/recaptcha)
[![Packagist](https://img.shields.io/packagist/dd/canducci/recaptcha.svg?style=flat)](https://packagist.org/packages/canducci/recaptcha)
[![Packagist](https://img.shields.io/packagist/dm/canducci/recaptcha.svg?style=flat)](https://packagist.org/packages/canducci/recaptcha)
[![Packagist](https://img.shields.io/packagist/l/canducci/recaptcha.svg)](https://packagist.org/packages/canducci/recaptcha)
[![Packagist](https://img.shields.io/packagist/v/canducci/recaptcha.svg?label=version)](https://packagist.org/packages/canducci/recaptcha)
[![](https://img.shields.io/twitter/url/https/packagist.org/packages/canducci/recaptcha.svg?style=social)]()

## Quick start

### Required setup

In the `require` key of `composer.json` file add the following

```PHP
"canducci/recaptcha": "1.0.*" 

```

Run the Composer update comand

    $ composer update
    
In your `config/app.php` add `providers` array

```PHP
'providers' => array(
    ...,    
    Canducci\ReCaptcha\Providers\ReCaptchaServiceProvider::class,
),
```   
 

At the end of `config/app.php` add o `aliases` (Facade) in array

```PHP
'aliases' => array(
    ...,    
    'ReCaptcha' => Canducci\ReCaptcha\Facades\ReCaptcha::class,
),
``` 

Run the Artisan comand

    php artisan vendor:publish --force --provider="Canducci\ReCaptcha\Providers\ReCaptchaServiceProvider"


In the `config/recaptcha.php` add `site_key` e `secret_key` of _Google ReCaptcha_ (https://www.google.com/recaptcha/intro/index.html).
