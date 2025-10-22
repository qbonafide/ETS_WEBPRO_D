@extends('layouts.app')

@section('content')
@vite(['resources/css/style.css', 'resources/js/app.js'])


<div class="container py-5 booking-page">
    <div class="row justify-content-center text-center mb-4">
        <h3 style="color:#432818; font-weight:600;">Booking</h3>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-md-3">
            <div class="card">
                <img src="{{ Vite::asset('resources/img/booking/individual-desk.jpg') }}" alt="Individual Desk">
                <div class="card-body">
                    <h5 class="card-title">Individual Desk</h5>
                    <a href="{{ route('booking.individual') }}" class="btn btn-book">Booking Now</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="{{ Vite::asset('resources/img/booking/group-desk.jpg') }}" alt="Group Desk">
                <div class="card-body">
                    <h5 class="card-title">Group Desk</h5>
                    <a href="{{ route('booking.group') }}" class="btn btn-book">Booking Now</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="{{ Vite::asset('resources/img/booking/vip-room.jpg') }}" alt="VIP Room">
                <div class="card-body">
                    <h5 class="card-title">VIP Room</h5>
                        <a href="{{ route('booking.vip') }}" class="btn btn-book">Booking Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
