{{-- resources/views/booking/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5 booking-page">
    <div class="row justify-content-center text-center mb-5">
        <h3 class="fw-bold text-brown">Choose Your Room</h3>
        <p class="text-muted">Select the type of study space that fits your needs</p>
    </div>

    <div class="row justify-content-center g-4">
        {{-- Individual Desk --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm room-card">
                <img src="{{ asset('img/booking/individual-desk.jpg') }}" 
                     alt="Individual Desk" 
                     class="card-img-top rounded-top">
                <div class="card-body text-center">
                    <h5 class="fw-semibold text-brown">Individual Desk</h5>
                    <p class="small text-muted mb-3">Perfect for solo study sessions</p>
                    <a href="{{ route('booking.individual') }}" 
                       class="btn btn-brown rounded-pill px-4">Book Now</a>
                </div>
            </div>
        </div>

        {{-- Group Desk --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm room-card">
                <img src="{{ asset('img/booking/group-desk.jpg') }}" 
                     alt="Group Desk" 
                     class="card-img-top rounded-top">
                <div class="card-body text-center">
                    <h5 class="fw-semibold text-brown">Group Desk</h5>
                    <p class="small text-muted mb-3">Collaborate and study together</p>
                    <a href="{{ route('booking.group') }}" 
                       class="btn btn-brown rounded-pill px-4">Book Now</a>
                </div>
            </div>
        </div>

        {{-- VIP Room --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm room-card">
                <img src="{{ asset('img/booking/vip-room.jpg') }}" 
                     alt="VIP Room" 
                     class="card-img-top rounded-top">
                <div class="card-body text-center">
                    <h5 class="fw-semibold text-brown">VIP Room</h5>
                    <p class="small text-muted mb-3">Exclusive private study experience</p>
                    <a href="{{ route('booking.vip') }}" 
                       class="btn btn-brown rounded-pill px-4">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.text-brown {
    color: #4b1f0e;
}

.btn-brown {
    background-color: #4b1f0e;
    color: white;
    border: none;
    transition: all 0.3s ease;
    font-weight: 600;
}
.btn-brown:hover {
    background-color: #3a2117;
}

.room-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
}
.room-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.card-img-top {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.booking-page {
    font-family: 'Poppins', sans-serif;
}

@media (max-width: 768px) {
    .card-img-top {
        height: 160px;
    }
}
</style>
@endpush
