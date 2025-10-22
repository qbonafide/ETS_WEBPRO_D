@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h2 class="mb-3 text-center">Add Room Type</h2>

  <form action="{{ route('room-types.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('room-types.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
