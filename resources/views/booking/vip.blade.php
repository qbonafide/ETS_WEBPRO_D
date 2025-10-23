{{-- resources/views/booking/vip.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0 p-4" style="background-color: #faf8f6;">
        {{-- Tombol Prev --}}
        <div class="mb-3">
            <a href="{{ route('booking') }}" class="text-decoration-none text-brown fw-semibold">
                <i class="bi bi-arrow-left"></i> Prev
            </a>
        </div>

        <div class="row align-items-center">
            {{-- Kolom kiri: gambar --}}
            <div class="col-md-4 text-center">
                <img src="{{ asset('img/booking/vip-room.jpg') }}"
                     alt="VIP Room"
                     class="img-fluid rounded shadow-sm mb-3 booking-image"
                     style="max-height: 400px; object-fit: cover;">
                <h6 class="fw-semibold text-brown">VIP Room</h6>
                <p class="fw-bold text-brown mb-0">Rp50.000/hour (VIP Room)</p>
            </div>

            {{-- Kolom kanan: tanggal & kursi --}}
            <div class="col-md-8">
                <div class="bg-white p-4 rounded shadow-sm border border-brown">
                    <div class="text-center mb-4">
                        <label for="bookingDate" class="form-label fw-semibold text-brown">
                            <i class="bi bi-calendar-week"></i> Choose Date
                        </label>
                        <input type="date" id="bookingDate"
                               class="form-control text-center border-2 border-brown mx-auto"
                               style="max-width: 250px; border-radius: 25px; cursor: pointer;">
                    </div>

                    <div class="text-center seat-grid">
                        <button type="button" class="seat-btn" id="vipSeat">VIP-1</button>
                    </div>
                </div>

                {{-- Tombol Next --}}
                <form action="{{ route('booking.time') }}" method="POST" class="text-end mt-3">
                    @csrf
                    <input type="hidden" name="room_type" value="VIP Room">
                    <input type="hidden" name="desk_number" id="desk_number">
                    <input type="hidden" name="date" id="selected_date">
                    <input type="hidden" name="price" value="50000">

                    <button type="submit" class="btn btn-brown rounded-pill px-5 py-2" id="nextBtn" disabled>
                        Next →
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    const seatBtn = document.getElementById("vipSeat");
    const deskInput = document.getElementById("desk_number");
    const nextBtn = document.getElementById("nextBtn");
    const dateInput = document.getElementById("bookingDate");
    const selectedDate = document.getElementById("selected_date");

    // Auto set tanggal ke hari ini
    const today = new Date().toISOString().split("T")[0];
    dateInput.value = today;
    selectedDate.value = today;

    // Update tanggal jika diubah
    dateInput.addEventListener("change", () => selectedDate.value = dateInput.value);

    // Pilih seat VIP
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
@endpush

@push('styles')
<style>
.text-brown {
    color: #4b1f0e;
}
.border-brown {
    border-color: #4b1f0e !important;
}
.btn-brown {
    background-color: #4b1f0e;
    color: #fff;
    border: none;
    transition: 0.2s;
}
.btn-brown:hover {
    background-color: #3a2117;
}
.seat-btn {
    margin: 6px;
    padding: 10px 20px;
    border: 2px solid #4b1f0e;
    background-color: white;
    border-radius: 25px;
    font-weight: 600;
    color: #4b1f0e;
    transition: all 0.2s;
}
.seat-btn:hover {
    background-color: #4b1f0e;
    color: white;
}
.seat-btn.active {
    background-color: #0d6efd;
    color: white;
    border-color: #0d6efd;
}
.btn-brown:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
@endpush
