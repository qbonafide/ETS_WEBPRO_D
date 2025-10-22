@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card shadow p-4 border-0" style="max-width: 400px; width: 100%;">
        <h3 class="text-center text-brown mb-4 fw-bold">Login to ITStudy</h3>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label text-brown">Email</label>
                <input type="email" name="email" class="form-control border-brown" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-brown">Password</label>
                <input type="password" name="password" class="form-control border-brown" required>
            </div>
            <button type="submit" class="btn btn-brown w-100 rounded-pill">Login</button>
            <p class="text-center mt-3">Don't have an account? 
                <a href="{{ route('register') }}" class="text-decoration-none text-brown fw-semibold">Register</a>
            </p>
        </form>
    </div>
</div>
@endsection

@if (session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

