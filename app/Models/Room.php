<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = "rooms";

    protected $fillable = [
        'room_number',
        //'price',
        //'availability',
        'id_cat'
    ];

    /** Une chambre appartient à une catégorie */
    function category()
    {
        return $this->belongsTo('App\Models\RoomCategory', 'id_cat');
    }


    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
}
