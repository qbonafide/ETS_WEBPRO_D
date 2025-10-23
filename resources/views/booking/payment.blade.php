@extends('layouts.app')
@vite(['resources/css/style.css', 'resources/js/app.js'])

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h3 class="fw-bold text-brown">Payment</h3>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-md-5 text-center">
            <h2 class="fw-bold text-brown mb-4">ITStudy</h2>
            <img src="{{ asset('img/payment/qr-code.png') }}" alt="Payment QR" class="img-fluid mb-3" style="max-width: 250px;">
            <p class="text-muted small">Upload your payment proof and wait for confirmation.</p>

            <form action="{{ route('booking.payment.upload') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $booking_id }}">
                <input type="file" id="paymentFile" name="payment_proof" class="form-control mb-3" accept="image/*,application/pdf" required>

                <button type="submit" id="donePaymentBtn" class="btn btn-brown rounded-pill px-5 py-2 fw-semibold" disabled>
                    Done Payment
                </button>
            </form>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 rounded-4" style="background-color:#fdf9f6;">
                <h5 class="fw-bold text-brown mb-3">Your Order</h5>

                <div class="d-flex justify-content-between"><span>Order ID</span><span>{{ $data['order_id'] }}</span></div>
                <div class="d-flex justify-content-between"><span>Room Type</span><span>{{ $data['room_type'] }}</span></div>
                <div class="d-flex justify-content-between"><span>Desk Number</span><span>{{ $data['desk_number'] }}</span></div>
                <div class="d-flex justify-content-between"><span>Date</span><span>{{ $data['date'] }}</span></div>
                <div class="d-flex justify-content-between"><span>Time</span><span>{{ $data['time'] }}</span></div>
                <hr>
                <div class="d-flex justify-content-between"><span>Price/hour</span><span>Rp{{ number_format($data['price'],0,',','.') }}/hour</span></div>
                <div class="d-flex justify-content-between"><span>Total hours</span><span>{{ $data['total_hours'] }} hours</span></div>
                <div class="d-flex justify-content-between fw-bold text-brown">
                    <span>Total price</span><span>Rp{{ number_format($data['total_price'],0,',','.') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const fileInput = document.getElementById('paymentFile');
  const btn = document.getElementById('donePaymentBtn');
  btn.disabled = true;
  fileInput.addEventListener('change', () => { btn.disabled = fileInput.files.length === 0; });
});
</script>

<style>
#donePaymentBtn:disabled{ background:#bdbdbd !important; border-color:#bdbdbd !important; cursor:not-allowed !important; }
</style>
@endsection
