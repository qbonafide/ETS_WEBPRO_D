@extends('layouts.app')
@section('content')
@vite(['resources/css/style.css', 'resources/js/app.js'])

<div class="container my-5">
    <div class="card shadow-sm border-0 p-4" style="background-color: #faf8f6;">
        {{-- Tombol Prev --}}
        <div class="mb-3">
            <a href="{{ route('booking') }}" class="text-decoration-none text-brown fw-semibold">
                <i class="bi bi-arrow-left"></i> Prev
            </a>
        </div>

        <div class="row align-items-center">
            {{-- Gambar --}}
            <div class="col-md-4 text-center">
                <img src="{{ asset('img/booking/vip-room.jpg') }}"
                     alt="VIP Room"
                     class="img-fluid rounded shadow-sm mb-3 booking-image">

                <h6 class="fw-semibold text-brown">VIP Room</h6>
                <p class="fw-bold text-brown mb-0">Rp50.000/hour (VIP Room)</p>
            </div>

            {{-- Pilih tanggal & seat --}}
            <div class="col-md-8">
                <div class="bg-white p-4 rounded shadow-sm border border-brown">
                    <div class="text-center mb-4">
                        <label for="bookingDate" class="form-label fw-semibold text-brown">
                            <i class="bi bi-calendar-week"></i> Choose Date
                        </label>
                        <input type="date" id="bookingDate"
                            class="form-control text-center border-2 border-brown mx-auto"
                            style="max-width: 250px; border-radius: 25px;"
                            value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="text-center seat-grid">
                        <button type="button" class="seat-btn" id="vipSeat">VIP-1</button>
                    </div>
                </div>

                {{-- Tombol Next --}}
                <form action="{{ route('booking.time') }}" method="POST" class="text-end mt-3">
                    @csrf
                    <input type="hidden" name="room_type" value="VIP Room">
                    <input type="hidden" name="desk_number" id="desk_number" value="">
                    <input type="hidden" name="date" id="selected_date">
                    <input type="hidden" name="price" value="50000">
                    <button type="submit" class="btn btn-brown rounded-pill px-5 py-2" id="nextBtn" disabled>Next →</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const seatBtn = document.getElementById("vipSeat");
    const deskInput = document.getElementById("desk_number");
    const nextBtn = document.getElementById("nextBtn");
    const dateInput = document.getElementById("bookingDate");
    const selectedDate = document.getElementById("selected_date");

    const today = new Date().toISOString().split("T")[0];
    dateInput.value = today;
    selectedDate.value = today;

    dateInput.addEventListener("change", () => selectedDate.value = dateInput.value);

    seatBtn.addEventListener("click", () => {
        seatBtn.classList.toggle("active");
        if (seatBtn.classList.contains("active")) {
            deskInput.value = "VIP-1";
            nextBtn.disabled = false;
        } else {
            deskInput.value = "";
            nextBtn.disabled = true;
        }
    });
});
</script>

<style>
.seat-btn {
    margin: 5px;
    padding: 10px 18px;
    border: 2px solid #4b1f0e;
    background-color: transparent;
    border-radius: 25px;
    font-weight: 600;
    color: #4b1f0e;
    transition: all 0.2s;
}
.seat-btn.active {
    background-color: #0d6efd;
    color: white;
    border-color: #0d6efd;
}
.seat-btn:hover {
    background-color: #4b1f0e;
    color: white;
}
</style>
@endsection
