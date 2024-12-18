<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAssignReservation extends Model
{
    use HasFactory;

    protected $table = "service_assign_reservations";

    protected $fillable = [
        'ref_reservation_assgn',
        'id_service',
    ];

    function service()
    {
        return $this->belongsTo('App\Models\Service', 'id_service');
    }
}
