<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveBookingForm extends FormRequest
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
            'room_booking' => 'required',
            'booking_customer' => 'required',
            'arrival_date_booking' => 'required|date',
            'departure_date_booking' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'room_booking.required' => __('room.please_select_a_room'),
            'booking_customer.required' => __('booking.please_select_a_customer'),
            'arrival_date_booking.required' =>  __('booking.please_select_the_arrival_date'),
            'departure_date_booking.required' => __('booking.please_select_departure_date'),
        ];
    }
}
