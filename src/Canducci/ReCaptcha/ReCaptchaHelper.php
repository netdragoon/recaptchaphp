<?php

use Canducci\ReCaptcha\ReCaptchaRenderDataSize;
use Canducci\ReCaptcha\ReCaptchaRenderDataType;
use Canducci\ReCaptcha\ReCaptchaRenderTheme;
use Canducci\ReCaptcha\ReCaptchaScriptLanguage;
use Canducci\ReCaptcha\ReCaptchaScriptRender;

if (!function_exists('recaptcha'))
{

    function recaptcha()
    {
        return app('recaptcha');
    }

}

if (!function_exists('recaptcha_render'))
{

    function recaptcha_render($dataTheme = ReCaptchaRenderTheme::Ligth,
                             $dataType = ReCaptchaRenderDataType::Image,
                             $dataSize = ReCaptchaRenderDataSize::Normal,
                             $tabIndex = 0,
                             $dataCallback = null,
                             $dataExpiredCallback = null)
    {

        return recaptcha()
            ->render($dataTheme,
                $dataType,
                $dataSize,
                $tabIndex,
                $dataCallback,
                $dataExpiredCallback);

    }

}

if (!function_exists('recaptcha_script'))
{

    function recaptcha_script($render = ReCaptchaScriptRender::Onload,
                             $hl = ReCaptchaScriptLanguage::None,
                             $onload = null)
    {

        return recaptcha()->script($render, $hl,$onload);

    }

}

if (!function_exists('recaptcha_valid'))
{

    function recaptcha_valid($response)
    {

        return recaptcha()->valid($response);

    }

}