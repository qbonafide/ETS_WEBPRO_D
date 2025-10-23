{{-- resources/views/booking/time.blade.php --}}
@extends('layouts.app')

@section('content')
@if (empty($data))
<div class="container my-5 text-center">
    <h4 class="text-danger">⚠ Page not loaded properly</h4>
    <p>Please go back and choose a desk again.</p>
    <a href="{{ route('booking') }}" class="btn btn-brown mt-3">← Back to Booking</a>
</div>
@else
<div class="container my-5">
    <div class="card shadow-sm p-4 border-0" style="background-color: #faf8f6;">
        {{-- Tombol Prev --}}
        <div class="mb-3">
            <a href="{{ $backUrl }}" class="text-decoration-none text-brown fw-semibold">
                <i class="bi bi-arrow-left"></i> Prev
            </a>
        </div>

        <div class="row align-items-center">
            {{-- Kolom kiri: Gambar & Info --}}
            <div class="col-md-4 text-center">
                @if ($data['room_type'] === 'Group Desk')
                    <img src="{{ asset('img/booking/group-desk.jpg') }}" 
                         class="img-fluid rounded shadow-sm mb-3" 
                         style="max-height:400px;object-fit:cover;">
                    <h6 class="fw-semibold text-brown">{{ $data['desk_number'] }}</h6>
                    <p class="fw-bold text-brown mb-0">Rp35.000/hour (10 desks)</p>
                @elseif ($data['room_type'] === 'VIP Room')
                    <img src="{{ asset('img/booking/vip-room.jpg') }}" 
                         class="img-fluid rounded shadow-sm mb-3" 
                         style="max-height:400px;object-fit:cover;">
                    <h6 class="fw-semibold text-brown">{{ $data['desk_number'] }}</h6>
                    <p class="fw-bold text-brown mb-0">Rp50.000/hour (Private)</p>
                @else
                    <img src="{{ asset('img/booking/individual-desk.jpg') }}" 
                         class="img-fluid rounded shadow-sm mb-3" 
                         style="max-height:400px;object-fit:cover;">
                    <h6 class="fw-semibold text-brown">{{ $data['desk_number'] }}</h6>
                    <p class="fw-bold text-brown mb-0">Rp4.000/hour (Individual)</p>
                @endif
            </div>

            {{-- Kolom kanan: Pilih waktu --}}
            <div class="col-md-8">
                <div class="bg-white p-4 rounded shadow-sm border border-brown text-center">
                    <h6 class="fw-semibold text-brown mb-4">
                        🕒 Choose Time ({{ $data['date'] }})
                    </h6>

                    <div class="time-grid">
                        @for ($i = 0; $i < 24; $i++)
                            @php
                                $hourStart = str_pad($i, 2, '0', STR_PAD_LEFT) . ':00';
                                $hourEnd   = str_pad(($i + 1) % 24, 2, '0', STR_PAD_LEFT) . ':00';
                                $isBooked  = in_array($hourStart, $bookedSlots ?? []);
                            @endphp
                            <button type="button"
                                class="time-btn {{ $isBooked ? 'booked' : '' }}"
                                {{ $isBooked ? 'disabled' : '' }}>
                                {{ $hourStart }}–{{ $hourEnd }}
                            </button>
                        @endfor
                    </div>
                </div>

                {{-- Tombol Next --}}
                <form action="{{ route('booking.payment') }}" method="POST" class="text-end mt-3">
                    @csrf
                    <input type="hidden" name="room_type" value="{{ $data['room_type'] }}">
                    <input type="hidden" name="desk_number" value="{{ $data['desk_number'] }}">
                    <input type="hidden" name="date" value="{{ $data['date'] }}">
                    <input type="hidden" name="time" id="selected_time">
                    <input type="hidden" name="price" value="{{ $data['price'] }}">

                    <button id="nextButton" type="submit" 
                            class="btn btn-brown rounded-pill px-5 py-2 mt-3" disabled>
                        Next →
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.querySelector('.time-grid');
    const selectedTimeInput = document.getElementById('selected_time');
    const nextButton = document.getElementById('nextButton');
    const selectedTimes = new Set();

    grid.addEventListener('click', (e) => {
        const btn = e.target.closest('.time-btn');
        if (!btn || btn.disabled) return;

        const timeValue = btn.textContent.trim();

        if (selectedTimes.has(timeValue)) {
            selectedTimes.delete(timeValue);
            btn.classList.remove('active');
        } else {
            selectedTimes.add(timeValue);
            btn.classList.add('active');
        }

        selectedTimeInput.value = Array.from(selectedTimes).join(',');
        nextButton.disabled = selectedTimes.size === 0;
    });
});
</script>
@endpush

@push('styles')
<style>
.text-brown { color: #4b1f0e; }
.border-brown { border-color: #4b1f0e !important; }

.btn-brown {
    background-color: #4b1f0e;
    color: #fff;
    border: none;
    font-weight: 600;
    transition: 0.2s;
}
.btn-brown:hover { background-color: #3a2117; }
.btn-brown:disabled { opacity: 0.6; cursor: not-allowed; }

.time-grid { 
    display: flex; 
    flex-wrap: wrap; 
    justify-content: center; 
    gap: 8px; 
}

.time-btn {
    border: 2px solid #4b1f0e;
    color: #4b1f0e;
    background: #fff;
    border-radius: 25px;
    padding: 6px 20px;
    font-weight: 600;
    transition: all 0.15s;
    user-select: none;
}
.time-btn:hover:not(:disabled):not(.booked) {
    background: #4b1f0e;
    color: #fff;
}
.time-btn.active {
    background: #0d6efd;
    border-color: #0d6efd;
    color: #fff;
}
.time-btn.booked {
    background: #ccc !important;
    border-color: #ccc !important;
    color: #666 !important;
    cursor: not-allowed !important;
}
</style>
@endpush
