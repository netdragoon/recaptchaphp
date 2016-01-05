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

        return [

            'g-recaptcha-response' => 'required|recaptcharesponse'

        ];

    }

    public function messages()
    {

        return [

            'g-recaptcha-response.required' => 'A g-recaptcha-response is required',
            'g-recaptcha-response.recaptcharesponse' => 'A g-recaptcha-response not valid'

        ];

    }

}