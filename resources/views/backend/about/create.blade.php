@extends('layouts.backend')

@section('title', 'Tambah About')

@section('content')
<h2>Tambah About</h2>

<form action="{{ route('backoffice.about.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" name="title" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control" rows="4" required></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Gambar</label>
    <input type="file" name="image" class="form-control">
  </div>
  <button class="btn btn-success">Simpan</button>
  <a href="{{ route('backoffice.about.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
