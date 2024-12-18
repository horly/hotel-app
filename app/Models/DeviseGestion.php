<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviseGestion extends Model
{
    use HasFactory;

    protected $table = "devise_gestions";

    protected $fillable = [
        'taux',
        'default_cur_manage',
        'id_devise',
    ];

    /** Une devise de gestion appartient à une devise */
    function devise()
    {
        return $this->belongsTo('App\Models\Devise', 'id_devise');
    }

    public function paymentMethod()
    {
        return $this->hasMany('App\Models\PaymentMethod');
    }
}
