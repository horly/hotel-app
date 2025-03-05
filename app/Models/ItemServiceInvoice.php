<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemServiceInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'id_service',
        'id_invoice',
    ];


    function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    function invoice()
    {
        return $this->belongsTo(Invoice::class, 'id_invoice');
    }
}
