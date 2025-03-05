<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRoomInvoice extends Model
{
    use HasFactory;

    protected $table = "item_room_invoices";

    protected $fillable = [
        'room_number',
        'room_cat_name',
        'room_price',
        'id_room',
        'id_invoice',
    ];

    function room()
    {
        return $this->belongsTo(Room::class, 'id_room');
    }

    function invoice()
    {
        return $this->belongsTo(Invoice::class, 'id_invoice');
    }
}
