<?php

namespace Canducci\ReCaptcha;

class ReCaptchaResponse
{
    private $response = null;
    private $sucess = false;
    private $erros = array('g-recaptcha-response-invalid-or-empty');

    /**
     * ReCaptchaResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        if (isset($response) && !empty($response))
        {
            $this->response = $response;
            $data = $this->verify();
            $this->sucess = (bool)$data['success'];
            $this->erros = isset($data['error-codes']) ?
                $data['error-codes'] :
                array();
        }
    }

    /**
     * @return true | false
     */
    public function success()
    {
        return $this->sucess;
    }

    /**
     * @return array
     */
    public function erros()
    {
        return $this->erros;
    }

    /**
     * @return mixed
     */
    private function verify()
    {
        $url = config('recaptcha.url_verify');
        $post = http_build_query(
            array
            (
                'response' => $this->response,
                'secret' => config('recaptcha.secret_key')
            )
        );
        $headers = array('Content-Type:application/x-www-form-urlencoded');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }
}