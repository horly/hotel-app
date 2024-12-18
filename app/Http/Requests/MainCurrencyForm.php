<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCurrencyForm extends FormRequest
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
            'main_currency' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
            'main_currency.required' => __('dashboard.please_select_a_main_currency'),
        ];
    }
}
