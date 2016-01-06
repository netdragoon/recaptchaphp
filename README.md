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
"canducci/recaptcha": "dev-master" 

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

###Usage

__Blade in View__

The `@recaptchascript()` blade in the tag `<head></head>`, example:

```HTML
<!DOCTYPE html>
<html>
    <head>
    <tile>ReCaptcha Test</tile>
    @recaptchascript()
    </head>
```    

The `@recaptcha()` blade in the tag `<form></form>`, example:
```HTML
<form action="/v" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @recaptcha()
    <button type="submit">Send</button>
</form>
```
___

__Variable in View__

_Controller_
```HTML
public function index1()
{
    return view('index1')
        ->with('script', recaptcha_script())
        ->with('captcha', recaptcha_render());
}

```

_Html_
```HTML
<!DOCTYPE html>
<html>
<head>
    <tile>ReCaptcha Test</tile>
    {!! $script !!}
```
and
```HTML   
<form action="/v" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {!! $captcha !!}
    <button type="submit">Send</button>
</form>
```    

___

__Verify__ `g-recaptcha-response` __is valid?__

__Use namespace:__

    use App\Http\Requests\ReCaptchaRequest;
    use Canducci\ReCaptcha\ReCaptcha;
    
1) With `ReCaptchaRequest`, example:

```PHP
public function post(ReCaptchaRequest $request, ReCaptcha $re)
{
    
}
```

2) In the method, example:

```PHP
public function v(Request $request, ReCaptcha $re)
{    
 
    $valid = $re->valid($request->get('g-recaptcha-response'));
    
    if ($valid)
    {
        //success
    }
    else
    {
        //not valid
    }
}

```

___

###The settings of the tags can be like this:

1) Function:
```PHP
$script = recaptcha_script(Canducci\ReCaptcha\ReCaptchaScriptRender::Onload, 
                           Canducci\ReCaptcha\ReCaptchaScriptLanguage::Armenian, 
                           'function_CallBack');
                           
$render = recaptcha_render(Canducci\ReCaptcha\ReCaptchaRenderTheme::Ligth, 
                           Canducci\ReCaptcha\ReCaptchaRenderDataType::Image, 
                           Canducci\ReCaptcha\ReCaptchaRenderDataSize::Normal, 
                           0, 
                           'function_CallBack', 
                           'function_dataExpiredCallBack');
```

2) Facade:

```PHP
use `Canducci\ReCaptcha\Facades\ReCaptcha as ReCaptchaFacade`
```    

```PHP    
$script = ReCaptchaFacade::script(Canducci\ReCaptcha\ReCaptchaScriptRender::Onload, 
                                  Canducci\ReCaptcha\ReCaptchaScriptLanguage::Armenian, 
                                  'function_CallBack');
                                  
$render = ReCaptchaFacade::render(Canducci\ReCaptcha\ReCaptchaRenderTheme::Ligth, 
                                  Canducci\ReCaptcha\ReCaptchaRenderDataType::Image, 
                                  Canducci\ReCaptcha\ReCaptchaRenderDataSize::Normal, 
                                  0, 
                                  'function_CallBack', 
                                  'function_dataExpiredCallBack');
```

3) Blade:
```PHP
@recaptchascript(Canducci\ReCaptcha\ReCaptchaScriptRender::Onload, 
                 Canducci\ReCaptcha\ReCaptchaScriptLanguage::Armenian,
                 'function_CallBack')

@recaptcha(Canducci\ReCaptcha\ReCaptchaRenderTheme::Ligth, 
           Canducci\ReCaptcha\ReCaptchaRenderDataType::Image, 
           Canducci\ReCaptcha\ReCaptchaRenderDataSize::Normal, 
           0, 
           'function_CallBack', 
           'function_dataExpiredCallBack')
```

__Obs:__ _These settings are not compulsory, but if necessary, following Google's website tutorial can be made._