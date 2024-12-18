<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomCategoryForm extends FormRequest
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
            'descriptionRoomCat' => 'required',
            'room_cat_price' => 'required|numeric',
            'room_cat_number_of_people' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            //
            'descriptionRoomCat.required' => __('article.enter_the_category_name_please'),

            'room_cat_price.required' => __('room.please_enter_the_room_cat_price'),
            'room_cat_price.numeric' => __('room.please_enter_a_valid_room_cat_price'),

            'room_cat_number_of_people.required' => __('room.please_indicate_the_number_of_people'),
            'room_cat_number_of_people.numeric' => __('room.please_enter_a_valid_number'),
        ];
    }
}
