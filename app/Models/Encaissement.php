<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encaissement extends Model
{
    use HasFactory;

    protected $table = "encaissements";

    protected $fillable = [
        'description',
        'reference_enc',
        'amount',
        'id_pay_meth',
    ];

    function paymentMethode()
    {
        return $this->belongsTo('App\Models\PaymentMethod', 'id_pay_meth');
    }
}
