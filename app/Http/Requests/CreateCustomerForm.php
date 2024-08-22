<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerForm extends FormRequest
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
            'firstNameCust' => 'required|regex:/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/',
            'lastNameCust' => 'required|regex:/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/',

            'emailCust' => 'required|email',
            'phoneCust' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            //
            'firstNameCust.required' => __('client.enter_customer_firstname_please'),
            'firstNameCust.regex' => __('client.enter_a_valid_customer_firstname_please'),

            'lastNameCust.required' => __('client.enter_customer_lastname_please'),
            'lastNameCust.regex' => __('client.enter_a_valid_customer_lastname_please'),

            'emailCust.required' => __('client.enter_customer_email_address_please'),
            'emailCust.email' => __('client.enter_a_valid_customer_email_address_please'),

            'phoneCust.required' => __('client.enter_customer_phone_number_please'),
            'phoneCust.numeric' => __('client.enter_a_valid_customer_phone_number_please'),
        ];
    }
}
