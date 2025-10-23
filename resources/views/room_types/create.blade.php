{{-- resources/views/room_types/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px; background-color: #fff8f3; border-radius: 15px;">
    <div class="card-body p-4">
      <h2 class="text-center fw-bold mb-4" style="color:#4b2c2a;">Add Room Type</h2>

      {{-- ✅ Flash message (optional) --}}
      @if(session('success'))
        <div class="alert alert-success text-center rounded-pill">{{ session('success') }}</div>
      @endif

      {{-- ✅ Form Create --}}
      <form action="{{ route('room-types.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label fw-semibold text-brown">Name</label>
          <input 
            type="text" 
            name="name" 
            class="form-control rounded-pill px-3 py-2" 
            placeholder="Enter room name" 
            required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold text-brown">Description</label>
          <textarea 
            name="description" 
            class="form-control rounded-4 px-3 py-2" 
            rows="4"
            placeholder="Enter short description..."></textarea>
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="{{ route('room-types.index') }}" class="btn btn-secondary rounded-pill px-4">Cancel</a>
          <button type="submit" class="btn btn-brown rounded-pill px-4">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .btn-brown {
    background-color: #4b2c2a;
    color: #fff;
    border: none;
    transition: 0.2s;
  }
  .btn-brown:hover {
    background-color: #3a2117;
  }
  .text-brown {
    color: #4b2c2a;
  }
  input.form-control, textarea.form-control {
    border: 2px solid #e0cfc4;
    transition: all 0.2s ease;
  }
  input.form-control:focus, textarea.form-control:focus {
    border-color: #4b2c2a;
    box-shadow: 0 0 0 0.1rem rgba(75, 44, 42, 0.25);
  }
</style>
@endpush
