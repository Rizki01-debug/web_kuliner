@extends('layouts.backend')

@section('title','Tambah Menu')

@section('content')
<h2>Tambah Menu</h2>

@if($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('backoffice.menus.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', 0) }}" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Gambar</label>
    <input type="file" name="image" class="form-control">
  </div>

<div class="form-check mb-3">
  <!-- nilai default kalau tidak dicentang -->
  <input type="hidden" name="is_published" value="0">

  <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1"
    {{ old('is_published') ? 'checked' : '' }}>
  <label class="form-check-label" for="is_published">Published</label>
</div>

 <label>Jadikan Favorit?</label>
    <input type="checkbox" name="is_favorite" value="1">
    <br>

  <button class="btn btn-success">Simpan</button>
  <a href="{{ route('backoffice.menus.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
