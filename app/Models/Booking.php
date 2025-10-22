<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','room_id','desk_number','booking_code',
        'booking_date','start_time','end_time','booked_slots',
        'total_hours','total_price','status',
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function room() { return $this->belongsTo(Room::class); }
    public function payment() { return $this->hasOne(Payment::class); }
}
