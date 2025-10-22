<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'booked_at',
        'date_use',
        'time_slot',
        'seat_type',
        'seat_number',
        'payment_proof',
        'status',
    ];
}
