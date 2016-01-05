<?php

if (!function_exists('recaptcha'))
{

    function recaptcha()
    {
        return app('recaptcha');
    }

}

if (!function_exists('recaptcharender'))
{

    function recaptcharender($dataTheme = ReCaptchaRenderTheme::Ligth,
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

if (!function_exists('recaptchascript'))
{

    function recaptchascript($render = ReCaptchaScriptRender::onload,
                             $hl = ReCaptchaScriptLanguage::None,
                             $onload = null)
    {

        return recaptcha()
            ->script($render,
                $hl,
                $onload);

    }

}