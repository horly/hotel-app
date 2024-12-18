<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceForm extends FormRequest
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
            'service_name' => 'required',
            'service_descpt' => 'required',
            'service_price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            //
            'service_name.required' => __('service.enter_the_service_name_please'),

            'service_descpt.required' => __('service.enter_the_service_description_please'),
            'service_price.numeric' => __('service.enter_the_valid_service_price'),
        ];
    }
}
