<?php

namespace Canducci\ReCaptcha;

class ReCaptcha
{
    public function render($dataTheme = ReCaptchaRenderTheme::Ligth,
                           $dataType = ReCaptchaRenderDataType::Image,
                           $dataSize = ReCaptchaRenderDataSize::Normal,
                           $tabIndex = 0,
                           $dataCallback = null,
                           $dataExpiredCallback = null)
    {

        $dataSiteKey = config('recaptcha.site_key');

        $options = '';

        if (!is_null($dataCallback))
        {
            $options .= sprintf('data-callback="%s"', $dataCallback);
        }

        if (!is_null($dataExpiredCallback))
        {
            $options .= sprintf('data-expired-callback="%s"', $dataExpiredCallback);
        }

        if ($options != '')
        {
            $options .= (' '.($options));
        }

        return sprintf('<div class="g-recaptcha" data-sitekey="%s" data-theme="%s" data-type="%s" data-size="%s" data-tabindex="%s"%s></div>',
            $dataSiteKey,
            $dataTheme,
            $dataType,
            $dataSize,
            $tabIndex,
            $options);

    }
    public function script($render = ReCaptchaScriptRender::onload,
                           $hl = ReCaptchaScriptLanguage::None,
                           $onload = null)
    {

        $options = sprintf('?render=%s', in_array((string)$render, array('explicit','onload')) ? $render: 'onload');

        if ($hl != '')
        {
            $options .= sprintf('&hl=%s', $hl);
        }

        if (!is_null($onload))
        {
            $options .= sprintf('&onload=%s', $onload);
        }

        return sprintf('<script src="https://www.google.com/recaptcha/api.js%s" async defer></script>', $options);

    }

    public function valid($input)
    {
        return true;
    }
}