{{-- resources/views/room_types/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color:#4b2c2a;">Room Type List</h2>
    <a href="{{ route('room-types.create') }}" class="btn btn-brown rounded-pill px-4">+ Add Room Type</a>
  </div>

  {{-- ✅ Flash message --}}
  @if(session('success'))
    <div class="alert alert-success text-center rounded-pill">{{ session('success') }}</div>
  @endif

  <div class="card shadow-sm border-0">
    <div class="card-body">
      <table class="table table-bordered align-middle text-center mb-0">
        <thead class="table-light">
          <tr>
            <th style="width:5%;">#</th>
            <th style="width:20%;">Name</th>
            <th>Description</th>
            <th style="width:20%;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($roomTypes as $type)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td class="fw-semibold">{{ $type->name }}</td>
              <td>{{ $type->description }}</td>
              <td>
                <a href="{{ route('room-types.edit', $type->id) }}" class="btn btn-warning btn-sm rounded-pill me-2">Edit</a>
                <form action="{{ route('room-types.destroy', $type->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm rounded-pill"
                          onclick="return confirm('Are you sure you want to delete this room type?')">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-muted text-center py-3">No Room Types found</td>
            </tr>
          @endforelse
        </tbody>
      </table>
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
  }
  .btn-brown:hover {
    background-color: #3a2117;
  }
  table.table-bordered th, table.table-bordered td {
    vertical-align: middle;
  }
  .card {
    background-color: #fff8f3;
    border-radius: 15px;
  }
</style>
@endpush
