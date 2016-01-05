<?php

namespace Canducci\ReCaptcha;

class ReCaptchaResponse
{
    private $response;
    private $sucess;
    private $erros = array();
    /**
     * ReCaptchaResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    public function success()
    {
        return $this->sucess;
    }

    public function erros()
    {
        return $this->erros;
    }
}