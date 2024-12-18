<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "services";

    protected $fillable = [
        'reference_number',
        'reference_service',
        'name',
        'description',
        'price',
    ];

    public function service_assign_reservations()
    {
        return $this->hasMany('App\Models\ServiceAssignReservation');
    }
}
