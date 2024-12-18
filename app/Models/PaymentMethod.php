<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = "payment_methods";

    protected $fillable = [
        'designation',
        'default',
        'institution_name',
        'iban',
        'account_number',
        'bic_swiff',
        'id_currency',
    ];

    function devisegest()
    {
        return $this->belongsTo('App\Models\DeviseGestion', 'id_currency');
    }

    public function encaissement()
    {
        return $this->hasMany('App\Models\Encaissement');
    }
}
