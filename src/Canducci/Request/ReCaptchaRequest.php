<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReCaptchaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'g-recaptcha-response' => 'required|recaptchavalidation'
        );

    }

    public function messages()
    {

        return array(
            'g-recaptcha-response.required' => 'A g-recaptcha-response is required',
            'g-recaptcha-response.recaptchavalidation' => 'A g-recaptcha-response not valid'
        );

    }

}