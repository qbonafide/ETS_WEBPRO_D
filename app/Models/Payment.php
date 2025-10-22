<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id','payment_code','payment_method','amount',
        'proof_path','status','payment_date',
    ];

    public function booking() { return $this->belongsTo(Booking::class); }
}
