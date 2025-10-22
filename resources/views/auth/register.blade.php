@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 90vh;">
    <div class="card shadow p-4 border-0" style="max-width: 450px; width: 100%;">
        <h3 class="text-center text-brown mb-4 fw-bold">Create an ITStudy Account</h3>

        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi error umum --}}
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form id="registerForm" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label text-brown">Full Name</label>
                <input type="text" name="name" class="form-control border-brown" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-brown">Email</label>
                <input type="email" name="email" class="form-control border-brown" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-brown">Password</label>
                <input type="password" id="password" name="password" class="form-control border-brown" required>
                <div id="passwordError" class="text-danger mt-1" style="display:none;">
                    Password must be at least 8 characters, contain at least 1 number, and match confirm password.
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label text-brown">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control border-brown" required>
            </div>
            <button type="submit" id="submitBtn" class="btn btn-brown w-100 rounded-pill">Register</button>
            <p class="text-center mt-3">Already have an account? 
                <a href="{{ route('login') }}" class="text-decoration-none text-brown fw-semibold">Login</a>
            </p>
        </form>
    </div>
</div>

<script>
    const form = document.getElementById('registerForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');
    const passwordError = document.getElementById('passwordError');
    const submitBtn = document.getElementById('submitBtn');

    function validatePassword() {
        const value = password.value;
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

    form.addEventListener('submit', function(e) {
        if (!validatePassword()) {
            e.preventDefault();
        }
    });
</script>
@endsection
