<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Booking::where('user_id', Auth::id())
            ->where('status', 'confirmed')   
            ->orderByDesc('booking_date')
            ->get();

        return view('reservation', compact('reservations'));
    }

    public function beginChange($id)
    {
        $booking = Booking::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        Session::put('change_booking_id', $booking->id);

        $roomTypeRoute = match ($booking->room_id) {
            1       => 'booking.individual',
            2       => 'booking.group',
            3       => 'booking.vip',
            default => 'booking.individual',
        };

        return redirect()->route($roomTypeRoute);
    }

    public function cancel($id)
    {
        $booking = Booking::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $booking->delete(); 
        return redirect()->route('reservation.index')->with('success', 'Reservation cancelled.');
    }
}
