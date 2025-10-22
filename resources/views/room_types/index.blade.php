@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h2 class="text-center mb-4">Room Type List</h2>

  <a href="{{ route('room-types.create') }}" class="btn btn-primary mb-3">+ Add Room Type</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($roomTypes as $type)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $type->name }}</td>
          <td>{{ $type->description }}</td>
          <td>
            <a href="{{ route('room-types.edit', $type->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('room-types.destroy', $type->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center">No Room Types found</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
