@extends('layouts.backend')

@section('title', 'Edit About')

@section('content')
<h2>Edit About</h2>

<form action="{{ route('backoffice.about.update', $about) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" name="title" class="form-control" value="{{ $about->title }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control" rows="4" required>{{ $about->description }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Gambar</label><br>
    @if($about->image)
      <img src="{{ asset('storage/'.$about->image) }}" width="150" class="mb-2"><br>
    @endif
    <input type="file" name="image" class="form-control">
  </div>
  <button class="btn btn-success">Update</button>
  <a href="{{ route('backoffice.about.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
