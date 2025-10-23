{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow-sm border-0 p-4" style="max-width: 450px; width: 100%; background-color:#fdf9f6; border-radius:15px;">
        <h3 class="text-center text-brown mb-4 fw-bold">Create an ITStudy Account</h3>

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="alert alert-success text-center rounded-pill">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger text-center rounded-pill">{{ session('error') }}</div>
        @endif

        <form id="registerForm" action="{{ route('register') }}" method="POST" novalidate>
            @csrf
            <div class="mb-3">
                <label class="form-label text-brown fw-semibold">Full Name</label>
                <input type="text" name="name" class="form-control border-brown rounded-pill px-3" value="{{ old('name') }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-brown fw-semibold">Email</label>
                <input type="email" name="email" class="form-control border-brown rounded-pill px-3" value="{{ old('email') }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-brown fw-semibold">Password</label>
                <input type="password" id="password" name="password" class="form-control border-brown rounded-pill px-3" required>
                <div id="passwordError" class="text-danger mt-1" style="display:none;">
                    Password must be at least 8 characters, include a number, and match confirmation.
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label text-brown fw-semibold">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control border-brown rounded-pill px-3" required>
            </div>

            <button type="submit" id="submitBtn" class="btn btn-brown w-100 rounded-pill mt-3 py-2 fw-semibold">
                Register
            </button>

            <p class="text-center mt-3 mb-0">
                Already have an account?
                <a href="{{ route('login') }}" class="text-brown fw-semibold text-decoration-none">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registerForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');
    const passwordError = document.getElementById('passwordError');

    function validatePassword() {
        const value = password.value.trim();
        const hasNumber = /\d/.test(value);
        const hasMinLength = value.length >= 8;
        const matchConfirm = value === confirmPassword.value;

        if (!hasNumber || !hasMinLength || !matchConfirm) {
            passwordError.style.display = 'block';
            return false;
        } else {
            passwordError.style.display = 'none';
            return true;
        }
    }

    password.addEventListener('input', validatePassword);
    confirmPassword.addEventListener('input', validatePassword);

    form.addEventListener('submit', (e) => {
        if (!validatePassword()) e.preventDefault();
    });
});
</script>
@endpush

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
