@extends('layouts.backend')

@section('title','Edit Menu')

@section('content')
<h2>Edit Menu</h2>

@if($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('backoffice.menus.update', $menu) }}" method="POST" enctype="multipart/form-data">
  @csrf @method('PUT')

  <div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $menu->title) }}" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description', $menu->description) }}</textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $menu->price) }}" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Gambar (ganti)</label>
    @if($menu->image)
      <div class="mb-2"><img src="{{ asset('storage/' . $menu->image) }}" alt="" style="width:120px;"></div>
    @endif
    <input type="file" name="image" class="form-control">
  </div>

  <div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="is_published" id="is_published" {{ old('is_published', $menu->is_published) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_published">Published</label>
  </div>

  <button class="btn btn-primary">Update</button>
  <a href="{{ route('backoffice.menus.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
