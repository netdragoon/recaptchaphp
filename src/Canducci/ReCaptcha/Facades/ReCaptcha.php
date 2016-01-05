<?php

namespace Canducci\ReCaptcha\Facades;

use Illuminate\Support\Facades\Facade;

class ReCaptcha extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'recaptcha';
    }

}