<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";

    protected $fillable = [
        'reference_cust',
        'reference_number',
        'firtName',
        'lastName',
        'address',
        'phoneNumber',
        'emailAddr',
    ];

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
}
