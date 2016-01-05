<?php

namespace Canducci\ReCaptcha;

class ReCaptchaValidation
{

    private $recaptcha;

    /**
     * ReCaptchaValid constructor.
     * @param ReCaptcha $recaptcha
     */
    public function __construct(ReCaptcha $recaptcha)
    {

        $this->recaptcha = $recaptcha;

    }

    /**
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @return mixed
     */
    public function validate($attribute, $value, $parameters, $validator)
    {
        $valid = $this->recaptcha->valid($value);
        return $valid->success();
    }
}