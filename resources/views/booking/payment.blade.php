{{-- resources/views/booking/payment.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h3 class="fw-bold text-brown">Payment</h3>
        <p class="text-muted">Complete your payment below and upload proof for confirmation.</p>
    </div>

    <div class="row justify-content-center align-items-start g-4">
        {{-- Kolom kiri: QR & Upload --}}
        <div class="col-md-5 text-center">
            <h2 class="fw-bold text-brown mb-4">ITStudy</h2>

            <img src="{{ asset('img/payment/qr-code.png') }}" 
                 alt="Payment QR" 
                 class="img-fluid mb-3 shadow-sm rounded" 
                 style="max-width: 250px;">

            <p class="text-muted small">Scan the QR code or transfer via the listed account.</p>

            <form action="{{ route('booking.payment.upload') }}" 
                  method="POST" 
                  enctype="multipart/form-data" 
                  class="mt-3">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $booking_id }}">

                <div class="mb-3">
                    <label for="paymentFile" class="form-label fw-semibold text-brown">
                        Upload Payment Proof
                    </label>
                    <input type="file" 
                           id="paymentFile" 
                           name="payment_proof" 
                           class="form-control rounded-pill text-center py-2"
                           accept="image/*,application/pdf" 
                           required>
                </div>

                <button type="submit" 
                        id="donePaymentBtn" 
                        class="btn btn-brown rounded-pill px-5 py-2 fw-semibold" 
                        disabled>
                    Done Payment
                </button>
            </form>
        </div>

        {{-- Kolom kanan: Ringkasan Order --}}
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

                <div class="d-flex justify-content-between fw-bold text-brown mt-3">
                    <span>Total Price</span>
                    <span>Rp{{ number_format($data['total_price'],0,',','.') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('paymentFile');
    const btn = document.getElementById('donePaymentBtn');
    btn.disabled = true;

    fileInput.addEventListener('change', () => {
        btn.disabled = fileInput.files.length === 0;
    });
});
</script>
@endpush

@push('styles')
<style>
.text-brown { color: #4b1f0e; }

.btn-brown {
    background-color: #4b1f0e;
    color: #fff;
    border: none;
    transition: 0.2s ease;
}
.btn-brown:hover { background-color: #3a2117; }
.btn-brown:disabled {
    background: #bdbdbd !important;
    border-color: #bdbdbd !important;
    cursor: not-allowed !important;
}

.card {
    border-radius: 15px;
}

.form-control {
    border: 2px solid #e0cfc4;
    transition: all 0.2s ease;
}
.form-control:focus {
    border-color: #4b1f0e;
    box-shadow: 0 0 0 0.15rem rgba(75, 31, 14, 0.25);
}
</style>
@endpush
