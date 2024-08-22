<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileInfoForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name_profile' => 'required|regex:/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/',
            'phone_number_profile' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name_profile.required' => __('auth.enter_your_name_please'),
            'name_profile.regex' => __('auth.enter_your_name_please'),

            'phone_number_profile.required' => __('auth.error_phone_number_register_message'),
            'phone_number_profile.numeric' => __('auth.error_phone_number_register_message'),
        ];
    }
}
