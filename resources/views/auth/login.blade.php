{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow-sm border-0 p-4" style="max-width: 400px; width: 100%; background-color:#fdf9f6; border-radius:15px;">
        <h3 class="text-center text-brown mb-4 fw-bold">Login to ITStudy</h3>

        {{-- Flash messages --}}
        @if (session('error'))
            <div class="alert alert-danger text-center rounded-pill py-2">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success text-center rounded-pill py-2">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label text-brown fw-semibold">Email</label>
                <input type="email" name="email" class="form-control border-brown rounded-pill px-3" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-brown fw-semibold">Password</label>
                <input type="password" name="password" class="form-control border-brown rounded-pill px-3" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-brown w-100 rounded-pill mt-3 py-2 fw-semibold">
                Login
            </button>

            <p class="text-center mt-3 mb-0">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-brown fw-semibold text-decoration-none">Register</a>
            </p>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
.text-brown { color: #4b1f0e; }
.border-brown { border: 2px solid #d8c7b7 !important; }
.btn-brown {
    background-color: #4b1f0e;
    color: #fff;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
}
.btn-brown:hover {
    background-color: #3a2117;
}
</style>
@endpush
