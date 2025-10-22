<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function index()     { return view('booking.index'); }
    public function individual(){ return view('booking.individual'); }
    public function group()     { return view('booking.group'); }
    public function vip()       { return view('booking.vip'); }

    public function time(Request $request)
    {
        if (!$request->has('room_type')) {
            return view('booking.time', ['data' => null]);
        }

        $data = [
            'room_type'   => $request->input('room_type'),
            'desk_number' => $request->input('desk_number'),
            'date'        => $request->input('date'),
            'price'       => (int) $request->input('price'),
        ];

        $roomId = match ($data['room_type']) {
            'Individual Desk' => 1,
            'Group Desk'      => 2,
            'VIP Room'        => 3,
            default           => 1,
        };

        $changeBookingId = Session::get('change_booking_id');
        $backUrl         = $changeBookingId ? route('reservation.index') : route('booking');

        $existing = Booking::where('booking_date', $data['date'])
            ->where('room_id', $roomId)
            ->where('desk_number', $data['desk_number'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->when($changeBookingId, fn($q) => $q->where('id', '!=', $changeBookingId))
            ->pluck('booked_slots')
            ->toArray();

        $bookedSlots = [];
        foreach ($existing as $slots) {
            foreach (explode(',', $slots) as $slot) {
                $slot = trim($slot);
                if (!$slot) continue;
                [$start] = explode('–', $slot);
                $bookedSlots[] = $start;
            }
        }

        return view('booking.time', [
            'data'        => $data,
            'bookedSlots' => $bookedSlots,
            'backUrl'     => $backUrl,
        ]);
    }

    public function payment(Request $request)
    {
        $times = array_filter(explode(',', (string) $request->input('time')));
        sort($times);

        if (count($times) === 0) {
            return back()->withErrors('Please select at least one time slot.');
        }

        $totalHours = count($times);

        $data = [
            'room_type'    => $request->input('room_type'),
            'desk_number'  => $request->input('desk_number'),
            'date'         => $request->input('date'),
            'time'         => implode(',', $times),
            'price'        => (int) $request->input('price'),
            'total_hours'  => $totalHours,
        ];

        $data['total_price'] = $data['price'] * $data['total_hours'];
        $data['order_id']    = strtoupper(Str::random(10));

        $roomId = match ($data['room_type']) {
            'Individual Desk' => 1,
            'Group Desk'      => 2,
            'VIP Room'        => 3,
            default           => 1,
        };

        [$firstStart] = explode('–', $times[0]);
        [, $lastEnd]  = explode('–', end($times));

        if (Session::has('change_booking_id')) {
            $booking = Booking::where('id', Session::get('change_booking_id'))
                ->where('user_id', Auth::id())
                ->firstOrFail();

            $booking->update([
                'room_id'      => $roomId,
                'desk_number'  => $data['desk_number'],
                'booking_date' => $data['date'],
                'start_time'   => $firstStart,
                'end_time'     => $lastEnd,
                'booked_slots' => implode(',', $times),
                'total_hours'  => $data['total_hours'],
                'total_price'  => $data['total_price'],
            ]);

            Session::forget('change_booking_id');

            return redirect()->route('reservation.index')
                ->with('success', 'Reservation has been updated.');
        }

        $booking = Booking::create([
            'user_id'      => Auth::id(),
            'room_id'      => $roomId,
            'desk_number'  => $data['desk_number'],
            'booking_code' => $data['order_id'],
            'booking_date' => $data['date'],
            'start_time'   => $firstStart,
            'end_time'     => $lastEnd,
            'booked_slots' => implode(',', $times),
            'total_hours'  => $data['total_hours'],
            'total_price'  => $data['total_price'],
            'status'       => 'pending',
        ]);

        $payment = Payment::create([
            'booking_id'     => $booking->id,
            'payment_code'   => strtoupper(Str::random(10)),
            'payment_method' => 'QRIS',
            'amount'         => $booking->total_price,
            'payment_date'   => now(),
            'status'         => 'pending',
        ]);

        return view('booking.payment', [
            'data'        => $data,
            'booking_id'  => $booking->id,
            'payment_id'  => $payment->id,
        ]);
    }

    public function uploadPayment(Request $request)
    {
        $request->validate([
            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:4096',
            'booking_id'    => 'required|integer|exists:bookings,id',
        ]);

        $payment = Payment::where('booking_id', $request->booking_id)
            ->latest('id')
            ->first();

        if (!$payment) {
            return back()->withErrors('Payment record not found for this booking.');
        }

        $path = $request->file('payment_proof')->store('payment_proofs', 'public');

        $payment->update([
            'proof_path'   => $path,
            'status'       => 'pending',
            'payment_date' => now(),
        ]);

        return redirect()->route('reservation.index')
            ->with('success', 'Payment proof uploaded. Waiting for confirmation.');
    }
}
