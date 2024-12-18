<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = "bookings";

    protected $fillable = [
        'reference_reservation',
        'arrival_date',
        'departure_date',
        'confirmed',
        'id_customer',
        'id_room',
    ];

    function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'id_customer');
    }

    function room()
    {
        return $this->belongsTo('App\Models\Room', 'id_room');
    }
}
