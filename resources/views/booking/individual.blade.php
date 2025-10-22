@extends('layouts.app')
@vite(['resources/css/style.css', 'resources/js/app.js'])

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0 p-4" style="background-color: #faf8f6;">

        {{-- Tombol Prev --}}
        <div class="mb-3">
            <a href="{{ route('booking') }}" class="text-decoration-none text-brown fw-semibold">
                <i class="bi bi-arrow-left"></i> Prev
            </a>
        </div>

        {{-- Kontainer utama --}}
        <div class="row align-items-center">
            {{-- Kolom kiri: gambar + harga --}}
            <div class="col-md-4 text-center">
                <img src="{{ Vite::asset('resources/img/booking/individual-desk.jpg') }}" 
                     alt="Individual Desk"
                     class="img-fluid rounded shadow-sm mb-3 booking-image">

                <h6 class="fw-semibold text-brown">Individual Desk</h6>
                <p class="fw-bold text-brown mb-0">Rp4000/hour</p>
            </div>

            {{-- Kolom kanan: pilih tanggal dan desk --}}
            <div class="col-md-8">
                <div class="bg-white p-4 rounded shadow-sm border border-brown text-center">
                    {{-- Pilih tanggal --}}
                    <div class="text-center mb-4">
                        <label for="bookingDate" class="form-label fw-semibold text-brown">
                            <i class="bi bi-calendar-week"></i> Choose Date
                        </label>
                        <input type="date" id="bookingDate"
                            class="form-control text-center border-2 border-brown mx-auto"
                            style="max-width: 250px; border-radius: 25px; cursor: pointer;">
                    </div>

                    {{-- Grid kursi --}}
                    <div class="seat-grid text-center">
                        @for ($i = 1; $i <= 28; $i++)
                            <button type="button" class="seat-btn">A{{ $i }}</button>
                            @if ($i % 7 == 0)
                                <br>
                            @endif
                        @endfor
                    </div>
                </div>

                {{-- Form Next --}}
                <form action="{{ route('booking.time') }}" method="POST" class="text-end mt-3">
                    @csrf
                    <input type="hidden" name="room_type" value="Individual Desk">
                    <input type="hidden" name="desk_number" id="desk_number">
                    <input type="hidden" name="date" id="selected_date">
                    <input type="hidden" name="price" value="4000">

                    <button id="nextButton" type="submit" class="btn btn-brown rounded-pill px-5 py-2" disabled>
                        Next →
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT UNTUK INTERAKSI --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dateInput = document.getElementById('bookingDate');
    const selectedDateInput = document.getElementById('selected_date');
    const seatButtons = document.querySelectorAll('.seat-btn');
    const deskInput = document.getElementById('desk_number');
    const nextButton = document.getElementById('nextButton');

    // === 1. SET DEFAULT DATE KE HARI INI ===
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    const todayStr = `${yyyy}-${mm}-${dd}`;
    dateInput.value = todayStr;
    selectedDateInput.value = todayStr;

    // update tanggal kalau diubah
    dateInput.addEventListener('change', function () {
        selectedDateInput.value = this.value;
        checkNextAvailability();
    });

    // === 2. PILIH SEAT ===
    seatButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            // hilangkan active di semua
            seatButtons.forEach(b => b.classList.remove('active'));
            // aktifkan seat ini
            this.classList.add('active');
            deskInput.value = this.textContent.trim();
            checkNextAvailability();
        });
    });

    // === 3. CEK SEMUA KONDISI ===
    function checkNextAvailability() {
        if (deskInput.value && selectedDateInput.value) {
            nextButton.disabled = false;
            nextButton.classList.remove('disabled');
        } else {
            nextButton.disabled = true;
            nextButton.classList.add('disabled');
        }
    }
});
</script>

<style>
/* Desain tombol kursi */
.seat-btn {
    border: 2px solid #5c2e00;
    color: #5c2e00;
    background-color: white;
    border-radius: 25px;
    margin: 5px;
    padding: 6px 20px;
    transition: all 0.2s ease-in-out;
}

.seat-btn:hover {
    background-color: #5c2e00; /* hover coklat */
    color: white;
}

.seat-btn.active {
    background-color: #0d6efd; /* aktif biru */
    border-color: #0d6efd;
    color: white;
}

/* Tombol Next */
.btn-brown {
    background-color: #5c2e00;
    color: white;
    font-weight: 600;
    border-radius: 25px;
    transition: all 0.2s ease-in-out;
}

.btn-brown:hover {
    background-color: #432818;
}

.btn-brown:disabled,
.btn-brown.disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
@endsection
