<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionnaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'             => 'required|unique:questionnaires',
            'age'               => 'required',
            'gender'            => 'required',
            'social_network'    => 'required',
            'facebook_time'     => 'required|integer',
            'whatsapp_time'     => 'required|integer',
            'twitter_time'      => 'required|integer',
            'instagram_time'    => 'required|integer',
            'tiktok_time'       => 'required|integer',
        ];
    }
}
