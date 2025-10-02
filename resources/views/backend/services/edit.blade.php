@extends('layouts.backend')

@section('title', 'Edit Service')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Service</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{ route('backoffice.services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Icon</label>
        <input type="file" name="icon" class="form-control">
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="is_active" class="form-check-input" value="1" checked>
        <label class="form-check-label">Aktif</label>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('backoffice.services.index') }}" class="btn btn-secondary">Batal</a>
</form>
</div>

@endsection
