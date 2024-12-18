<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomForm extends FormRequest
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
            'room_number' => 'required',
            'room_category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
            'room_number.required' => __('room.please_enter_the_room_number'),
            'room_category.required' => __('room.please_select_a_room_category'),
        ];
    }
}
