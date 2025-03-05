<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'price',
        'price_service_included',
        'id_booking',
    ];

    public function booking() {
        return $this->belongsTo(Booking::class, 'id_booking');
    }

    public function itemServiceInvoice() {
        return $this->hasMany(ItemServiceInvoice::class);
    }

    public function itemRoomInvoices()
    {
        return $this->hasMany(ItemRoomInvoice::class);
    }
}
