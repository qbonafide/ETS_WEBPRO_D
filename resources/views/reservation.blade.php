@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center fw-bold mb-4" style="color:#4b2c20;">My Reservations</h2>

    @if (session('success'))
        <div class="alert alert-success text-center rounded-pill">{{ session('success') }}</div>
    @endif

    {{-- ✅ Jika belum ada reservasi --}}
    @if ($reservations->isEmpty())
        <div class="text-center my-5">
            <p class="text-muted mb-3">You don’t have any reservations yet.</p>
            <a href="{{ route('booking') }}" class="btn btn-brown rounded-pill px-4">Make a Reservation</a>
        </div>
    @else
        {{-- ✅ Daftar reservasi --}}
        @foreach ($reservations as $r)
            <div class="card shadow-sm border-0 mb-4" style="background:#fdf9f6;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Reservation #{{ $r->id }}</h5>
                        <span class="badge bg-success">Confirmed</span>
                    </div>

                    {{-- ✅ Tabel detail reservasi --}}
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th style="width:220px;background:#f6e9df;">Room Type</th>
                                    <td>
                                        @php
                                            $roomName = match($r->room_id) {
                                                1 => 'Individual Desk',
                                                2 => 'Group Desk',
                                                3 => 'VIP Room',
                                                default => 'Room '.$r->room_id
                                            };
                                        @endphp
                                        {{ $roomName }}
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background:#f6e9df;">Desk Number</th>
                                    <td>{{ $r->desk_number }}</td>
                                </tr>
                                <tr>
                                    <th style="background:#f6e9df;">Date</th>
                                    <td>{{ \Carbon\Carbon::parse($r->booking_date)->translatedFormat('l, d M Y') }}</td>
                                </tr>
                                <tr>
                                    <th style="background:#f6e9df;">Time</th>
                                    <td>{{ $r->booked_slots }}</td>
                                </tr>
                                <tr>
                                    <th style="background:#f6e9df;">Total Hours</th>
                                    <td>{{ $r->total_hours }} hour(s)</td>
                                </tr>
                                <tr>
                                    <th style="background:#f6e9df;">Total Price</th>
                                    <td>Rp{{ number_format($r->total_price, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- ✅ Tombol aksi --}}
                    <div class="d-flex gap-3 justify-content-center mt-4">
                        <form action="{{ route('reservation.cancel', $r->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger rounded-pill px-4 w-100" style="min-width:160px;">
                                Cancel
                            </button>
                        </form>

                        <form action="{{ route('reservation.beginChange', $r->id) }}" method="GET">
                            <button type="submit" class="btn btn-warning rounded-pill px-4 w-100" style="min-width:160px;">
                                Change
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

{{-- ✅ Style khusus halaman ini --}}
@push('styles')
<style>
    .btn-brown {
        background:#4b2c20;
        color:#fff;
    }
    .btn-brown:hover {
        background:#3a2117;
    }
</style>
@endpush
@endsection
